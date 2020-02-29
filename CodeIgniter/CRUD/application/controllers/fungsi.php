<?php


class Fungsi extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('dataModel');
        $this->load->helper('url');
    }

    function index()
    {
        $data['dataModel'] = $this->dataModel->get_data();
        $this->load->view('adminView', $data);
    }

    function tambah()
    {
        $this->load->view('inputView');
    }

    function addMenu()
    {
        $id = $this->input->post('id_menu');
        $nama = $this->input->post('nama_menu');
        $harga = $this->input->post('harga');
        $id_kategori = $this->input->post('id_kategori');

        $data = array(
            'id_menu' => $id,
            'nama_menu' => $nama,
            'harga' => $harga,
            'id_kategori' => $id_kategori
        );
        $this->dataModel->input_data($data, 'menu');
        redirect('fungsi/index');
    }

    function allUser()
    {
      $data['dataModel'] = $this->dataModel->all_user()->result_array();
      $this->load->view('listUser', $data);
    }

    function addUser()
    {

      //set form validation
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');

      //set message form validation
      $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
      <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

        $nama = $this->input->post('nama');
        $password = $this->input->post('password');

        //cek validasi
        if ($this->form_validation->run() === TRUE) {

          $data = array(
              'nama' => $nama,
              'password' => $password
          );
          $this->dataModel->input_data($data, 'user');
          redirect('fungsi/index');
        } else {
            $this->load->view('addUser');
        }
    }

    function hapus($id)
    {
        $where = array('id_menu' => $id);
        $this->dataModel->hapus_data($where, 'menu');
        redirect('crud/index');
    }

    function user()
    {
        $this->load->view('addUser');
    }

    function edit($id)
    {
        $where = array('id_menu' => $id);
        $data['menu'] = $this->dataModel->edit_data($where, 'menu')->result();
        $this->load->view('editView', $data);
    }
    function update()
    {
        $id = $this->input->post('id_menu');
        $nama = $this->input->post('nama_menu');
        $alamat = $this->input->post('harga');

        $data = array(
            'nama_menu' => $nama,
            'harga' => $alamat,
        );

        $where = array(
            'id_menu' => $id
        );

        $this->dataModel->update_data($where, $data, 'menu');
        redirect('fungsi/index');
    }
}
