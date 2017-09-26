<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_berita extends Q_Controller {

    private $upload_path = "./assets/uploads";

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('m_adm_berita');
    }

    public function index()
    {
        $m = $this->m_adm_berita;
        $base = base_url();
        $CSS = '<link rel="stylesheet" href="'.$base.'assets/plugins/datatables/dataTables.bootstrap.css">
                <link rel="stylesheet" href="'.$base.'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
                <link rel="stylesheet" href="'.$base.'assets/css/dropzone-min.css">';
        $CSS .= $this->load->view('adm_kategori/css', '', true);
        $JS = '<script src="'.$base.'assets/plugins/datatables/jquery.dataTables.min.js"></script>
                <script src="'.$base.'assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
                <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
                <script src="'.$base.'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
                <script src="'.$base.'assets/js/dropzone-min.js"></script>';
        $JS .= $this->load->view('adm_berita/js', '', true);
        $JS .= $this->load->view('adm_berita/js_dropzone', '', true);
        $JS .= $this->load->view('adm_kategori/js_datatable', '', true);
        $JS .= $this->load->view('adm_berita/js_ckeditor', '', true);
        $MASTER = array(
            "TITLE" => "Berita",
            "SUBTITLE" => "Tabel Berita",
        );
        $VIEW = array('list' => $m->get(),
                        'drop_kategori' => $m->kategori());
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_berita/home", $VIEW)
        ->master("template", $MASTER);
    }

    public function tambah()
    {
        $m = $this->m_adm_berita;
        $base = base_url();
        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required|max_length[150]');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required|min_length[10]');
        if ($this->form_validation->run() == FALSE) {
            $CSS = '<link rel="stylesheet" href="'.$base.'assets/plugins/datatables/dataTables.bootstrap.css">
                    <link rel="stylesheet" href="'.$base.'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
                    <link rel="stylesheet" href="'.$base.'assets/css/dropzone-min.css">';
            $CSS .= $this->load->view('adm_kategori/css', '', true);
            $JS = '<script src="'.$base.'assets/plugins/datatables/jquery.dataTables.min.js"></script>
                    <script src="'.$base.'assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
                    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
                    <script src="'.$base.'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
                    <script src="'.$base.'assets/js/dropzone-min.js"></script>';
            $JS .= $this->load->view('adm_berita/js', '', true);
            $JS .= $this->load->view('adm_berita/js_dropzone', '', true);
            $JS .= $this->load->view('adm_kategori/js_datatable', '', true);
            $JS .= $this->load->view('adm_berita/js_ckeditor', '', true);
            $MASTER = array(
                "TITLE" => "Berita",
                "SUBTITLE" => "Tabel Berita",
            );
            $VIEW = array('list' => $m->get(),
                        'drop_kategori' => $m->kategori());
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_berita/home", $VIEW)
            ->master("template", $MASTER);
        } else {
            // MEMBUAT SLUG
            $judul = $this->input->post("judul_berita");
            $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $judul);
            $trim = trim($string);
            $pre_slug = strtolower(str_replace(" ", "-", $trim));
            $slug = $pre_slug.'.html';

            $data = array(
                    "judul_berita" => $judul,
                    "isi_berita" => $this->input->post("isi_berita"),
                    "gambar_berita" => $this->input->post('foto'),
                    "id_kategori" => $this->input->post("id_kategori"),
                    "slug" => $slug,
                    "id_user" => $this->session->userdata('id_user')
                );
            $m->tambah($data);
            $this->session->set_flashdata('info', 'Berita berhasil ditambah');
            redirect('adm_berita');
        }
    }

    public function edit($id_berita)
    {
        $m = $this->m_adm_berita;
        $base = base_url();
        if ($this->input->post('edit')) {
            $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required|max_length[150]');
            $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required|min_length[10]');
            if ($this->form_validation->run() == FALSE) {
                $CSS = '<link rel="stylesheet" href="'.$base.'assets/plugins/datatables/dataTables.bootstrap.css">
                        <link rel="stylesheet" href="'.$base.'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
                        <link rel="stylesheet" href="'.$base.'assets/css/dropzone-min.css">';
                $CSS .= $this->load->view('adm_kategori/css', '', true);
                $JS = '<script src="'.$base.'assets/plugins/datatables/jquery.dataTables.min.js"></script>
                        <script src="'.$base.'assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
                        <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
                        <script src="'.$base.'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
                        <script src="'.$base.'assets/js/dropzone-min.js"></script>';
                $JS .= $this->load->view('adm_berita/js', '', true);
                $JS .= $this->load->view('adm_berita/js_dropzone', '', true);
                $JS .= $this->load->view('adm_kategori/js_datatable', '', true);
                $JS .= $this->load->view('adm_berita/js_ckeditor', '', true);
                $MASTER = array(
                    "TITLE" => "Berita",
                    "SUBTITLE" => "Edit Berita",
                );
                $VIEW = array("detail" => $m->getEdit($id_berita)->row(),
                            'drop_kategori' => $m->kategori());
                $this->template
                ->css($CSS)
                ->js($JS)
                ->view("adm_berita/edit", $VIEW)
                ->master("template", $MASTER);
            } else {
                // MEMBUAT SLUG
                $judul = $this->input->post("judul_berita");
                $string = preg_replace('/[^a-zA-Z0-9 &%|{.}=,?!*()"-_+$@;<>]/', '', $judul);
                $trim = trim($string);
                $pre_slug = strtolower(str_replace(" ", "-", $trim));
                $slug = $pre_slug.'.html';

                $data = array(
                        "judul_berita" => $judul,
                        "isi_berita" => $this->input->post("isi_berita"),
                        "id_kategori" => $this->input->post("id_kategori"),
                        "slug" => $slug,
                        "id_user" => $this->session->userdata('id_user')
                    );
                $condition["id_berita"] = $this->input->post("id_berita");
                $m->edit($data, $condition);
                $this->session->set_flashdata('info', 'Berita berhasil di edit');
                redirect('adm_berita');
            }
        } elseif ($this->input->post('submit')) {
            $data = array(
                'gambar_berita' => $this->input->post('foto')
            );
            $condition["id_berita"] = $this->input->post("id_berita");
            $m->edit($data, $condition);
            $this->session->set_flashdata('info', 'Foto Berhasil Di Edit');
            redirect("adm_berita/edit/".$condition['id_berita']."");
        } else {
            $CSS = '<link rel="stylesheet" href="'.$base.'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
                    <link rel="stylesheet" href="'.$base.'assets/css/dropzone-min.css">';
            $CSS .= $this->load->view('adm_kategori/css', '', true);
            $JS = '<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
                    <script src="'.$base.'assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
                    <script src="'.$base.'assets/js/dropzone-min.js"></script>';
            $JS .= $this->load->view('adm_berita/js', '', true);
            $JS .= $this->load->view('adm_berita/js_dropzone', '', true);
            $JS .= $this->load->view('adm_berita/js_ckeditor', '', true);
            $MASTER = array(
                "TITLE" => "Berita",
                "SUBTITLE" => "Edit Berita",
            );
            $VIEW = array("detail" => $m->getEdit($id_berita)->row(),
                        'drop_kategori' => $m->kategori());
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("adm_berita/edit", $VIEW)
            ->master("template", $MASTER);
        }
    }

    public function hapus($id_berita)
    {
        $m = $this->m_adm_berita;
        $m->hapus($id_berita);
        if ($this->db->affected_rows()) {
            $this->session->set_flashdata('info', 'Berita berhasil dihapus');
            redirect('adm_berita');
        } else {
            $this->session->set_flashdata('info', 'Berita Gagal Dihapus');
            redirect('adm_berita');
        }
    }

    // FOTO FILE
    public function Upload()
    {
        if (!empty($_FILES)) {
            $config['upload_path'] = $this->upload_path;
            $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp';
            $config['max_size'] = '3072';
            $config['max_width']  = '5000';
            $config['max_height']  = '5000';
            $this->load->library('upload', $config);
            if (! $this->upload->do_upload("file")) {
                echo "GAGAL UPLOAD ";
            }
        }
    }

    public function Remove()
    {
        $file = $this->input->post("foto");
        if ($file && file_exists($this->upload_path. "/" .$file)) {
            unlink($this->upload_path. "/" .$file);
        }
    }

}

/* End of file Adm_berita.php */
/* Location: ./application/modules/adm_berita/controllers/Adm_berita.php */