<?php 

/**          
*     _ __ ___ __  __  
*    | '_ ` _ \\ \/ /  
*    | | | | | |>  < _ 
*    |_| |_| |_/_/\_(_)
*    ------------------
*    
* http://github.com/Alphasquare/Mxious
* http://alphasquare.us/
*                  
* @author Crunch D&D Team
* @license MIT License
* @copyright Alphasquare
* @package Core
* @version 0.0.4-prealpha
*
*/

class APIUtils {

	public static function json($array) {
		return json_encode($array);
	}

	public static function api_msg($message) {
		$array = array('message' => $message);
		return json_encode($array);
	}
	
}