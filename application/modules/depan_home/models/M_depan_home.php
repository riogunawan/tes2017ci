<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_depan_home extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get_allberita($batas=null, $offset=null, $key=null)
    {
        $this->db->from('tb_berita A');
        $this->db->join('tb_kategori B', 'B.id_kategori = A.id_kategori');
        $this->db->join('tb_user C', 'C.id_user = A.id_user');
        $this->db->order_by('tgl_berita', 'desc');
        if($batas != null){
           $this->db->limit($batas,$offset);
        }
        if ($key != null) {
           $this->db->or_like($key);
        }
        $query = $this->db->get();

        //cek apakah ada barang
        if ($query->num_rows() > 0) {
            return $query->result();
        }
    }

    public function count_berita()
    {
        $query = $this->db->get('tb_berita')->num_rows();
        return $query;
    }

    public function get_berita_by_slug($slug)
    {
        $this->db->join('tb_kategori B', 'B.id_kategori = A.id_kategori');
        $this->db->join('tb_user C', 'C.id_user = A.id_user');
        $this->db->where('slug', $slug);
        return $this->db->get('tb_berita A');
    }

    public function get_side_berita()
    {
        $this->db->join('tb_kategori B', 'B.id_kategori = A.id_kategori');
        $this->db->join('tb_user C', 'C.id_user = A.id_user');
        $this->db->order_by('tgl_berita', 'desc');
        $this->db->limit(3);
        return $this->db->get('tb_berita A');
    }

}

/* End of file M_depan_home.php */
/* Location: ./application/modules/depan_home/models/M_depan_home.php */