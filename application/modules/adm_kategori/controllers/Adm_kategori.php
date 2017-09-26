<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_kategori extends Q_Controller {

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('m_adm_kategori');
    }

    public function index()
    {
        $m = $this->m_adm_kategori;
        $base = base_url();
        $CSS = '<link rel="stylesheet" href="'.$base.'assets/plugins/datatables/dataTables.bootstrap.css">';
        $CSS .= $this->load->view('adm_kategori/css', '', true);
        $JS = '<script src="'.$base.'assets/plugins/datatables/jquery.dataTables.min.js"></script>
                <script src="'.$base.'assets/plugins/datatables/dataTables.bootstrap.min.js"></script>';
        $JS .= $this->load->view('adm_kategori/js', '', true);
        $JS .= $this->load->view('adm_kategori/js_datatable', '', true);
        $MASTER = array(
            "TITLE" => "Kategori",
            "SUBTITLE" => "Tabel Kategori",
        );
        $VIEW = array('list' => $m->get(), );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_kategori/home", $VIEW)
        ->master("template", $MASTER);
    }

    public function tambah()
    {
        $m = $this->m_adm_kategori;
        $base = base_url();
        if ($this->input->post('submit')) {
            $this->form_validation->set_rules('kategori_berita', 'Kategori Berita', 'required|max_length[30]');
            if ($this->form_validation->run() == FALSE) {
                $CSS = '<link rel="stylesheet" href="'.$base.'assets/plugins/datatables/dataTables.bootstrap.css">';
                $CSS .= $this->load->view('adm_kategori/css', '', true);
                $JS = '<script src="'.$base.'assets/plugins/datatables/jquery.dataTables.min.js"></script>
                        <script src="'.$base.'assets/plugins/datatables/dataTables.bootstrap.min.js"></script>';
                $JS .= $this->load->view('adm_kategori/js', '', true);
                $JS .= $this->load->view('adm_kategori/js_datatable', '', true);
                $MASTER = array(
                    "TITLE" => "Kategori",
                    "SUBTITLE" => "Tabel Kategori",
                );
                $VIEW = array('list' => $m->get(), );
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_kategori/home", $VIEW)
                ->master("template", $MASTER);
            } else {
                $data = array(
                        "kategori_berita" => $this->input->post("kategori_berita")
                    );
                $m->tambah($data);
                $this->session->set_flashdata('info', 'Kategori berhasil ditambah');
                redirect('adm_kategori');
            }
        } else {
            redirect('adm_kategori');
        }
    }

    public function edit($id_kategori)
    {
        $m = $this->m_adm_kategori;
        $base = base_url();
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('kategori_berita', 'Kategori Berita', 'required|max_length[30]');
            if ($this->form_validation->run() == FALSE) {
                $CSS = '';
                $JS = $this->load->view('adm_kategori/js', '', true);
                $MASTER = array(
                    "TITLE" => "Kategori",
                    "SUBTITLE" => "Edit Kategori",
                );
                $VIEW = array('detail' => $m->getEdit($id_kategori)->row(), );
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_kategori/edit", $VIEW)
                ->master("template", $MASTER);
            } else {
                $data = array(
                        "kategori_berita" => $this->input->post("kategori_berita")
                    );
                $condition["id_kategori"] = $this->input->post("id_kategori");
                $m->edit($data, $condition);
                $this->session->set_flashdata('info', 'Kategori berhasil diubah');
                redirect('adm_kategori');
            }
        } else {
            $CSS = '';
            $JS = $this->load->view('adm_kategori/js', '', true);
            $MASTER = array(
                "TITLE" => "Kategori",
                "SUBTITLE" => "Edit Kategori",
            );
            $VIEW = array('detail' => $m->getEdit($id_kategori)->row(), );
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_kategori/edit", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function hapus($id_kategori)
    {
        $m = $this->m_adm_kategori;
        $m->hapus($id_kategori);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'Kategori berhasil dihapus');
            redirect('adm_kategori');
        } else {
            $this->session->set_flashdata('info', 'Kategori Gagal Dihapus');
            redirect('adm_kategori');
        }
    }

}

/* End of file Adm_kategori.php */
/* Location: ./application/modules/adm_kategori/controllers/Adm_kategori.php */