<?php

class Notes extends CI_Model
{
	public $name;
	public $text;
	public $user;

	public function insert($name, $text)
	{
		$this->name = $name;
		$this->text = $text;
		$this->user = $_SESSION["id"];
		$this->db->insert("notes", $this);
	}

	public function get()
	{
		$query = $this->db->get_where("notes", ["user" => $_SESSION["id"]]);

		return $query->result();
	}

	public function delete($id)
	{
		$this->db->where("id", $id);
		$this->db->delete("notes");
	}

	public function update($id, $name, $text)
	{
		$this->db->where("id", $id);
		$this->name = $name;
		$this->text = $text;
		$this->user = $_SESSION["id"];

		$this->db->update("notes", $this);
	}
}
