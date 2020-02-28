<?php

class Login extends CI_Controller{

  function __construct()
  {
    parent::__construct();
    $this->load->model('loginModel');
  }

  function index()
  {
    $this->load->view('loginView');
  }

  function auth_login()
  {

    //set form validation
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    //set message form validation
    $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

      $username = $this->input->post('username');
      $password = $this->input->post('password');
      $where = array( 'nama' => $username, 'password' => $password );

      //cek validasi
      if ($this->form_validation->run() === TRUE) {

        $user = $this->loginModel->filterLogin("user", $where)->num_rows();
        $admin = $this->loginModel->filterLogin("admin", $where)->num_rows();

        if ($user > 0) {
          $data_session = array('nama' => $username, 'status' => "login");

          $this->session->set_userdata($data_session);

          redirect (base_url("user"));

        } elseif ($admin > 0) {
          $data_session = array('nama' => $username, 'status' => "login");

          $this->session->set_userdata($data_session);

          redirect(base_url("admin"));

        } else {
          $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
          <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
          $this->load->view('loginView', $data);

        }
      } else {
          $this->load->view('loginView');
      }

  }

  function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('login'));
  }

}

 ?>
