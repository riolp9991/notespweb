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
}

/* End of file Task.php */
