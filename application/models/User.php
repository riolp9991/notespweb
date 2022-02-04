<?php

class User extends CI_Model
{
	public $name;
	public $password;

	public function insert($name, $password)
	{
		$this->name = $name;
		$this->password = password_hash($password, PASSWORD_DEFAULT);

		$this->db->insert("user", $this);
	}

	public function login($name, $password){
		$query = $this->db->get_where('user',['name' => $name], 1);
		$res = $query->result();

		$data = array();

		if(count($res) < 1){
			$data['login_error'] = 'Usuario No Encontrado';
			return $data;
		}

		if(!password_verify($password, $res[0]->password)){
			$data['login_error'] = 'Contrasena no valida';
			return $data;
		}

		$data['user'] = $res[0];
		return $data;
	}
}
