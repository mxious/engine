<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('api_model');
	}

	public function index() {
		$query = $this->input->post('search_query');
		if ($query) {
			$data['title'] = "Searching for {$query}";
			$results = $this->api_model->search($query);
			$data['error_occurred'] = false;
			$data['empty_resultset'] = false;

			if (!$results) {
				flash_msg('Oh noes, something went really wrong! Please try again later. (-1)');
			} elseif (empty($results['album_results']) && empty($results['artist_results']) && empty($results['song_results'])) {
				flash_msg('Nothing found. Why not add a song or album to our database?');
			}


			$data['api_obj'] = $this->api_model;
			$data['album_results'] = $results['album_results'];
			$data['song_results'] = $results['song_results'];
			$data['artist_results'] = $results['artist_results'];

			$data['container'] = true;
			$data['results'] = $results;
			$this->template->load('search', $data);

		} else {
			$data['title'] = "Search";
			$data['error_occurred'] = false;
			$data['empty_resultset'] = false;
			$data['container'] = true;
			$this->template->load('search', $data);
		}

	}

}

/* End of file search.php */
/* Location: ./application/controllers/search.php */