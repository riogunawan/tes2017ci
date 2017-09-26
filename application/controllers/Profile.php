<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('cek_login');
	}

	public function index() {

		$data = array(
			"CONTENT" => "default",
			// "CONTENT_DATA" => $CONTENT_DATA,
			// "ITEM_HEAD" => $ITEM_HEAD,
			// "CSS" => $CSS,
			// "ITEM_FOOT" => $ITEM_FOOT,
			// "JS" => $JS,
		);

		$this->load->view('master/wrapper', $data);
		
	}

	public function edit () {
		$CONTENT_DATA = array(
			"title" => "title dari controller"
		);

		$ITEM_HEAD = "
		<link rel='stylesheet' href='plugins/datepicker/datepicker3.css'>
		";

		$CSS = "
		<style>
			h1 { color: #000 }
		</style>
		";

		$ITEM_FOOT = "
		<script src='dist/js/demo.js'></script>
		";

		$JS = "
		<script>
			alert();
		</script>
		";

		$data = array(
			"TITLE" => "TITLE",
			"SUBTITLE" => "SUB TITLE",
			"CONTENT" => "home",
			"CONTENT_DATA" => $CONTENT_DATA,
			"ITEM_HEAD" => $ITEM_HEAD,
			"CSS" => $CSS,
			"ITEM_FOOT" => $ITEM_FOOT,
			"JS" => $JS,
		);

		$this->load->view('master/wrapper', $data);
	}
}
