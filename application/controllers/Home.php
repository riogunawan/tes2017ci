<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index() {

		$data = array(
			"TITLE" => "TITLE",
			"SUBTITLE" => "SUB TITLE",
			"CONTENT" => "home",
			// "CONTENT_DATA" => $CONTENT_DATA,
			// "ITEM_HEAD" => $ITEM_HEAD,
			// "CSS" => $CSS,
			// "ITEM_FOOT" => $ITEM_FOOT,
			// "JS" => $JS,
		);

		$this->load->view('master/wrapper', $data);

	}
}
