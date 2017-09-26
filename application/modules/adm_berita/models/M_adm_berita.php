<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adm_berita extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get()
    {
        $this->db->join('tb_kategori B', 'B.id_kategori = A.id_kategori');
        $this->db->order_by('tgl_berita', 'desc');
        return $this->db->get('tb_berita A');
    }

    public function kategori()
    {
        return $this->db->get('tb_kategori');
    }

    public function tambah($data)
    {
        $this->db->insert('tb_berita', $data);
    }

    public function getEdit($id_berita)
    {
        $this->db->join('tb_kategori B', 'B.id_kategori = A.id_kategori');
        return $this->db->get_where('tb_berita A', array('id_berita' => $id_berita));
    }

    public function edit($data, $condition)
    {
        $this->db->where($condition);
        $this->db->update('tb_berita', $data);
    }

    public function hapus($id_berita)
    {
        $this->db->where('id_berita', $id_berita);
        $this->db->delete('tb_berita');
    }

}

/* End of file M_adm_berita.php */
/* Location: ./application/modules/adm_berita/models/M_adm_berita.php */