<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Todo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('todos');
    }

    public function index()
    {
        if ($this->input->server("REQUEST_METHOD") === "GET") {
            if (!isset($_SESSION["id"])) redirect("/", "refresh");
            $data["field"] = "list";
            $data["todo"] = $this->todos->get();

            $this->load->view("node", $data);
        }
        if ($this->input->server("REQUEST_METHOD") === "POST") {
            if ($this->input->post("editing") == "false") {
                $postItems =  array();

                foreach ($_POST as $key => $value) {
                    if (strpos($key, 'task-') !== false) {
                        array_push($postItems, $value);
                    }
                }

                $this->todos->insert($this->input->post("name"), $postItems);
                redirect("/todo", "refresh");
                return;
            }
        }

        if (isset($_POST["delete"])) {
            $this->todos->delete($_POST["delete"]);

            redirect("/todo");
            return;
        }
    }
}

/* End of file Todo.php */
