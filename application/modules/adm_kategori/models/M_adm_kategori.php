<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_kategori extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        return $this->db->get('tb_kategori');
    }

    public function tambah($data)
    {
        $this->db->insert('tb_kategori', $data);
    }

    public function getEdit($id_kategori)
    {
        return $this->db->get_where('tb_kategori', array('id_kategori' => $id_kategori));
    }

    public function edit($data, $condition)
    {
        $this->db->where($condition);
        $this->db->update('tb_kategori', $data);
    }

    public function hapus($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('tb_kategori');
    }

}

/* End of file M_adm_kategori.php */
/* Location: ./application/modules/adm_kategori/models/M_adm_kategori.php */