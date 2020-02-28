<?php

  /**
   *
   */
  class loginModel extends CI_Model
  {

    function filterLogin($table,$where)
    {
      return $this->db->get_where($table,$where);
    }
  }


 ?>
