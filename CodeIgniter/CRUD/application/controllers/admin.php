<?php

class admin extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('dataModel');

		if($this->session->userdata('status') != "login"){
			redirect(base_url('login'));
		}
	}

	function index(){
        $data['dataModel']= $this->dataModel->get_data();
        $this->load->view('adminView',$data);
	}
}
