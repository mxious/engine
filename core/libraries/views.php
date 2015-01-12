<?php

/**
 * Mxious Views
 * 
 * This is the Mxious view loader. Loads views and handles data.
 * 
 * @author Alphapixels
 * @category Libraries
 * @version 0.0.1pre-alpha
 * 
 */

class Views {
	static function load($name, $data = null) {

		if ($data !== null) {
			extract($data);
		}

		include('/core/views/'.$name.'.php');
	}
}