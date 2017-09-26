<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Depan_home extends Q_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_depan_home');
        $this->load->helper('h_fungsidate');
        $this->load->library('pagination');
    }

    private $batas = 2; //jlh data yang ditampilkan per halaman

    public function halaman($config)
    {
        $config['full_tag_open'] = '<ul class="pagination pagination-success">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '<i class="fa fa-angle-double-left"></i>&nbsp; Awal';
        $config['first_tag_open'] = '<li class="disabled">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Akhir &nbsp;<i class="fa fa-angle-double-right"></i>';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Selanjutnya &nbsp;<i class="fa fa-arrow-circle-right"></i>';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '<i class="fa fa-arrow-circle-left"></i>&nbsp; Sebelumnya';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
    }

    public function index()
    {
       $CSS = '';
        // $JS = $this->load->view('depan_home/js', '', true);
        $JS = '';
        $MASTER = array(
            "TITLE" => "BERITA",
            "SUBTITLE" => "Home"
        );
        $VIEW = '';
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("depan_home/home", $VIEW)
        ->master("template_depan", $MASTER);
    }

    public function berita()
    {
        $m = $this->m_depan_home;

        $page=$this->input->get('per_page');

        if(!$page):     //jika page bernilai kosong maka batas akhirna akan di set 0
           $offset = 0;
        else:
           $offset = $page; // jika tidak kosong maka nilai batas akhir nya akan diset nilai page terakhir
        endif;

        $batas = $this->batas;

        $config['page_query_string'] = TRUE; //mengaktifkan pengambilan method get pada url default
        $config['base_url'] = base_url().'depan_home/berita/index';   //url yang muncul ketika tombol pada paging diklik
        $config['total_rows'] = $m->count_berita(); // jlh total berita
        $config['per_page'] = $batas; //batas sesuai dengan variabel batas

        $config['uri_segment'] = $page; //merupakan posisi pagination dalam url pada kesempatan ini saya menggunakan method get untuk menentukan posisi pada url yaitu per_page

        $this->halaman($config);

        $base = base_url();
        $CSS = "";
        $JS = $this->load->view('depan_home/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "Berita",
            "SUBTITLE" => "Semua Berita",
        );
        $VIEW = array(
            'paging' => $this->pagination->create_links(),
            'jlhpage' => $page,
            'qberita' => $m->get_allberita($batas,$offset) //query model semua berita
            );
        $this->template
        ->css($CSS)
        ->js($JS)
        ->view("depan_home/berita", $VIEW)
        ->master("template_depan", $MASTER);
    }

    public function detail($slug)
    {
        $m = $this->m_depan_home;
        $base = base_url();
        $CSS = "";
        $JS = $this->load->view('depan_home/js', '', TRUE);
        $MASTER = array(
            "TITLE" => "Berita",
            "SUBTITLE" => "Detail Berita",
        );
        $VIEW = array(
            'detail' => $m->get_berita_by_slug($slug),
            'list' => $m->get_side_berita()
            );
        if ($VIEW['detail']->num_rows() > 0) {  //NGECEK ADE KE NDAK
            $this->template
            ->css($CSS)
            ->js($JS)
            ->view("depan_home/detail", $VIEW)
            ->master("template_depan", $MASTER);
        } else { //INI MISAL NDAK ADA
            redirect('depan_home/berita');
        }
    }

}

/* End of file Depan_home.php */
/* Location: ./application/modules/depan_home/controllers/Depan_home.php */