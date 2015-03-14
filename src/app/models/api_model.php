<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

// DEPRECATED

class API_model extends CI_Model {

	public function search($query) {
		$factory = new Factory();
		$requestSigner = $factory->newRequestSigner();
		$credentials = new Credentials(API_KEY, API_SECRET);

		// Create a GET request and set an endpoint
		$guzzle = new GuzzleHttpClient(['base_url' => API_BASEURL]);
		// Build a path string
		$path = $this->path_str('search', $query);
		$request = $guzzle->createRequest('GET', $path);

		// Sign the request
		$requestSigner->signRequest(new GuzzleHttpRequestAdapter($request), $credentials);

		// Send signed request
		try {
			$response = $guzzle->send($request);
			return $this->parse_response($response);
		} catch (GuzzleHttp\Exception\ClientException $e) {
			return false;
		}
	}

	public function path_str($path, $data = null) {
		if ($data !== null) {
			return API_INDEX.$path.'/'.$data;
		} else {
			return API_INDEX.$path.'/';
		}
	}

	public function parse_response($response) {
		$body = $response->getBody();
		$json = json_decode($body, true);
		return $json;
	}

	public function cover_img($query, $artist_id = null) {

		if ($artist_id !== null) {
			$info = $this->artist_info($artist_id);
			$artist = $info['name'];
			$query = "{$query} {$artist}";
		}

		$query = preg_replace('{ [^ \w \s \' " ] }x', ' ', $query);

		$guzzle = new GuzzleHttpClient(['base_url' => 'http://itunes.apple.com']);

		$request = $guzzle->createRequest('GET', '/search?term='.$query.'&limit=1&media=music&entity=musicArtist,musicTrack,album,mix,song');

		try {

			$response = $guzzle->send($request);
			$array = $this->parse_response($response);

			if (!empty($array)) {

				if (empty($array['results'])) {
					return "http://dummyimage.com/255x255/f57f17/ffffff&text=no+cover+art+found";
				}

				$result = $array['results'][0];

				if (array_key_exists('artworkUrl100', $result)) {
					$coverimg = $result['artworkUrl100'];
					return str_replace("100x100", "255x255", $coverimg);
				} else {
					return "http://dummyimage.com/255x255/f57f17/ffffff&text=no+cover+art+found";
				}
				
			} else {
				return "http://dummyimage.com/255x255/f57f17/ffffff&text=no+cover+art+found";
			}
		} catch (GuzzleHttp\Exception\ClientException $e) {
			return "http://dummyimage.com/255x255/f57f17/ffffff&text=no+cover+art+found";
		}
	}

	public function artist_info($id) {
			$factory = new Factory();
			$requestSigner = $factory->newRequestSigner();
			$credentials = new Credentials(API_KEY, API_SECRET);

			// Create a GET request and set an endpoint
			$guzzle = new GuzzleHttpClient(['base_url' => API_BASEURL]);
			// Build a path string
			$path = $this->path_str('artist', $id);
			$request = $guzzle->createRequest('GET', $path);

			// Sign the request
			$requestSigner->signRequest(new GuzzleHttpRequestAdapter($request), $credentials);

			// Send signed request
			try {
				$response = $guzzle->send($request);
				return $this->parse_response($response);
			} catch (GuzzleHttp\Exception\ClientException $e) {
				return false;
			}
	}

}

/* End of file api_model.php */
/* Location: ./application/controllers/api_model.php */