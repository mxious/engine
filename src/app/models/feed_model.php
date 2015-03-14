<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Feed_model extends CI_Model {

	public function get_posts($type = 'feed', $limit = 5, $offset = 0,  Array $params) {
	    $this->db->select('id, content, user_id, url, img_url, title, time')
         ->from('posts');
		switch ($type) {
			case 'feed':
				$this->db->order_by("time", $params['order']); 
				$this->db->limit($limit, $offset);
				return $this->db->get()->result_array();
			break;
			case 'user':
				$this->db->where('user_id', $params['user_id']);
				$this->db->order_by("time", $params['order']); 
				$this->db->limit($limit, $offset);
				return $this->db->get()->result_array();
			break;
			case 'search':
				$this->db->like('content', $params['query'], 'both');
				$this->db->limit($limit, $offset);
				return $this->db->get()->result_array();
			break;
		}
	}

	public function get_post_data($id, Array $return = null) {
		if ($return !== null) {
			$query = implode(", ", $array);
	    	$this->db->select($query)
        		->from('posts')
        		->where('id', $id);			
		} else {
			$this->db->get('posts')
				->where('id', $id);
		}
		return $this->db->get()->result_array();
	}

}
