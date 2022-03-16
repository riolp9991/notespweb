<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Todo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->input->server("REQUEST_METHOD") === "GET") {
            if (!isset($_SESSION["id"])) redirect("/", "refresh");
            $data["field"] = "todo";

            $this->load->view("node", $data);
        }
    }
}

/* End of file Todo.php */
