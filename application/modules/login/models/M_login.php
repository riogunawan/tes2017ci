<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function cek_user($data)
    {
        $query = $this->db->get_where('tb_user', $data);
        return $query;
    }

}

/* End of file M_login.php */
/* Location: ./application/modules/login/models/M_login.php */