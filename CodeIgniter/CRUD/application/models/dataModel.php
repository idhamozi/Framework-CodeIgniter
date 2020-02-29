<?php

class dataModel extends CI_Model{

	function all_user()
	{
		return $this->db->get('transaksi');
	}

	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	function reset($table){
		$this->db->truncate($table);
	}

	function edit_data($where,$table){
		return $this->db->get_where($table,$where);
	}

	function update_data($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function get_data (){
    return $this->db->get('menu')->result_array();
	}

  public function data_pesanan (){
    return $this->db->get('t_sementara')->result_array();
  }

    public function keranjang($where,$table){
		return $this->db->get_where($table,$where);
	}
}