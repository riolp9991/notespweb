<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Model
{
    public $text;
    public $todo;

    public function insert(String $text, Int $todo)
    {
        $this->text = $text;
        $this->todo = $todo;

        $this->db->insert('todoitem', $this);
    }

    public function get($todo)
    {
        $query = $this->db->get_where("todoitem", ["todo" => $todo]);

        return $query->result();
    }
}

/* End of file Task.php */
