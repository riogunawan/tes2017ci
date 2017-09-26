<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adm_home extends Q_Controller {

    public function __construct()
    {
        parent::__construct();
        Modules::run("login/auth");
        $this->load->model('m_adm_home');
    }

    public function index()
    {
        $m = $this->m_adm_home;
        $CSS = "";
        $JS = $this->load->view('adm_home/js', '', true);
        $MASTER = array(
            "TITLE" => "Home",
            "SUBTITLE" => "Dashboard",
        );
        $VIEW = array(
                'jlhberita' => $m->berita()->num_rows(),
                'jlhkategori' => $m->kategori()->num_rows()
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("adm_home/home", $VIEW)
        ->master("template", $MASTER);
    }

}

/* End of file Adm_home.php */
/* Location: ./application/modules/adm_home/controllers/Adm_home.php */