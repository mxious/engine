<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index() {
		$data['title'] = 'Home';
		$data['container'] = false;
		$data['stylesheets'] = array('assets/css/home.css');
		$this->template->load('home', $data);
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */