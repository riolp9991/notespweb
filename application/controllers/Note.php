<?php

class Note extends CI_Controller{
	public function index(){
		$data['field'] = 'notes';
		$this->load->view('node', $data);
	}
}
