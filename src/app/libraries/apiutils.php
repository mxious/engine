<?php 

class APIUtils {

	public static function json($array) {
		return json_encode($array);
	}

	public static function api_msg($message) {
		$array = array('message' => $message);
		return json_encode($array);
	}
	
}