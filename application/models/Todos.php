<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Todos extends CI_Model
{
    public $name;
    public $user;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('task');
    }


    public function insert($name, $values)
    {

        $this->name = $name;
        $this->user = $_SESSION["id"];

        $this->db->insert('todo', $this);

        $insert_id = $this->db->insert_id();

        foreach ($values as $task) {
            $this->task->insert($task, $insert_id);
        }
    }
}

/* End of file Todo.php */
