<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('feed_model');
	}

	public function index() {
		$data['title'] = 'Home';
		$data['container'] = false;
		$data['stylesheets'] = array('assets/css/home.css');
		$data['posts'] = $this->feed_model->get_posts('feed', 5, 0, array('order' => 'desc'));
		$this->template->load('home', $data);
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */