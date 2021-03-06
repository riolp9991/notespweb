<?php
class Note extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("notes");
	}

	public function index()
	{
		if ($this->input->server("REQUEST_METHOD") === "GET") {
			if (!isset($_SESSION["id"])) redirect("/", "refresh");
			$data["field"] = "notes";
			$data["notes"] = $this->notes->get();
			$this->load->view("node", $data);
		} elseif ($this->input->server("REQUEST_METHOD") === "POST") {
			if (isset($_POST["delete"])) {
				$this->notes->delete($this->input->post("delete"));
				redirect("/home");
				return;
			}

			if ($this->input->post("editing") == "false") {
				$this->notes->insert(
					$this->input->post("name"),
					$this->input->post("text")
				);
				$data["created"] = "Creado Satisfactoriamente";
				redirect("/home", "refresh");
				return;
			}

			if ($this->input->post("editing") == "true") {
				$this->notes->update(
					$this->input->post("noteID"),
					$this->input->post("name"),
					$this->input->post("text")
				);
				$data["created"] = "Editado Satisfactoriamente";
				redirect("/home", "refresh");
				return;
			}
		}
	}
}
