<?php

class Pesanan extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('dataModel');
        $this->load->helper('url');
    }

    public function index () {
        $data['dataModel'] = $this->dataModel->data_pesanan();
        $this->load->view('cartView', $data);
    }

    public function tambah()
    {
        $jumlah = $this->input->post('quantity');
        $harga = $this->input->post('harga');
        $total_bayar = $harga * $jumlah;
        $data = array(
            'id_menu_pesanan' => $this->input->post('kode'),
            'nama_menu' => $this->input->post('nama'),
            'total_harga'   => $total_bayar,
            'qty' => $this->input->post('quantity')
        );
        $this->dataModel->input_data($data, 't_sementara');
        redirect('pesanan');
    }

    function hapus($id)
    {
        $where = array('id_menu_pesanan' => $id);
        $this->dataModel->hapus_data($where, 't_sementara');
        redirect('pesanan');
    }

    function reset()
    {
        $this->dataModel->reset('t_sementara');
        redirect('pesanan');
    }

    function bayar()
    {
        $data = array(
            'id_pesanan'=> $this->input->post('id'),
            'nama_pembeli'    => $this->input->post('nama'),
            'total_harga'   => $this->input->post('harga')
        );
        $this->dataModel->input_data($data, 'transaksi');
        $this->dataModel->reset('t_sementara');
        header('location:'.base_url().'user');
    }
}
