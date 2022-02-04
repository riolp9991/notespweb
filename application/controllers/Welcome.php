<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Welcome extends CI_Controller
{
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->load->library("form_validation");

		$this->form_validation->set_rules("name", "Nombre", "required");
		$this->form_validation->set_rules("password", "Contrasena", "required");

		if ($this->input->server("REQUEST_METHOD") === "GET") {
			$this->load->view("welcome_message");
		} elseif ($this->input->server("REQUEST_METHOD") === "POST") {
			if ($this->form_validation->run() === false) {
				$data["error"] =
					"Ha ocurrido un error verifique todos los campos, puede que las contrasenas no coinsidan";
				$this->load->view("welcome_message", $data);
			} else {
				$this->load->model("user");

				$data = $this->user->login(
					$this->input->post("name"),
					$this->input->post("password")
				);

				$this->session->set_userdata([
					'id' => $data->id,
					'name' => $data->name
				]);

				$this->load->view("welcome_message", $data);
			}
		}
	}

	public function register()
	{
		$this->load->library("form_validation");

		$this->form_validation->set_rules("name", "Nombre", "required|min_length[3]|is_unique[user.name]");
		$this->form_validation->set_rules("password", "Contrasena", "required");
		$this->form_validation->set_rules("checkpassword", "Contrasena", "required|matches[password]");

		if ($this->input->server("REQUEST_METHOD") === "GET") {
			$this->load->view("register");
		} elseif ($this->input->server("REQUEST_METHOD") === "POST") {
			if ($this->form_validation->run() === false) {
				$data["error"] =
					"Ha ocurrido un error verifique todos los campos, puede que las contrasenas no coinsidan";
				$this->load->view("register", $data);
			} else {
				$this->load->model("user");

				$this->user->insert(
					$this->input->post("name"),
					$this->input->post("password")
				);
				$data['success'] = 'Creado Correctamente';

				$this->load->view("register", $data);
			}
		}
	}
}
