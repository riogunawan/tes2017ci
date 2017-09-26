<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_home extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function berita()
    {
        return $this->db->get('tb_berita');
    }

    public function kategori()
    {
        return $this->db->get('tb_kategori');
    }

}

/* End of file M_adm_home.php */
/* Location: ./application/modules/adm_home/models/M_adm_home.php */