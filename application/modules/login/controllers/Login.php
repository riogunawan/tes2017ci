<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Q_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }

    public function index()
    {
        // UNTUK MENGECEK APAKAH SUDAH LOGIN
        if ($this->session->userdata('masuk') == 'Sudah Login') {
            echo "<script type='text/javascript'>alert('Anda sudah Login')</script>";
            redirect('adm_home','refresh'); //adm_home = controller admin panel
        }
        if (!empty($this->session->flashdata('belum-login'))) {
            echo "<script type='text/javascript'>alert('belum Login')</script>";
        }

        $MASTER = array(
            "TITLE" => "Login",
            "SUBTITLE" => "Halaman Login Admin Panel Berita",
        );
        $this->template
        ->view("login/home")
        ->master("template_login", $MASTER);
    }

    public function masuk($value='')
    {
        $m = $this->m_login;
        // UTK MEMBACA USERNAME DAN PASSWORD YG ADA DIDATABASE MELALUI MODEL
        $data = array('username' => $this->input->post('username', TRUE),
                    'password' => md5($this->input->post('password', TRUE))
                );
        $hasil = $m->cek_user($data);

        if ($hasil->num_rows() == 1) {
            foreach ($hasil->result() as $sess) {
                $sess_data['masuk'] = 'Sudah Login';
                $sess_data['id_user'] = $sess->id_user;
                $sess_data['username']  = $sess->username;
                $sess_data['level_user'] = $sess->level_user;
                $sess_data['nama_user'] = $sess->nama_user;
                $sess_data['foto_user'] = $sess->foto_user;
                $sess_data['created_user'] = $sess->created_user;
                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('level_user') == 'Admin') {
                redirect('adm_home');
            } else {
                redirect('login/auth');
            }
        }
        else {
            echo "<script type='text/javascript'>alert('Gagal Login: Cek Username dan Password!!!')</script>";
            redirect('login','refresh');
        }
    }

    public function auth()
    {
        if ($this->session->userdata('masuk') != 'Sudah Login') {
            $this->session->set_flashdata('belum-login', 'false');
            redirect('login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login','refresh');
    }

}

/* End of file Login.php */
/* Location: ./application/modules/login/controllers/Login.php */