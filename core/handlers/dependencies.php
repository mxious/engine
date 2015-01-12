<?php

/**
 * Mxious DependencyHandler
 * 
 * This is the Mxious DependecyHandler. Loads all libraries, keeps code tidy.
 * 
 * @author Alphapixels
 * @category Handler-Library
 * @version 0.0.1pre-alpha
 * 
 */

class DependencyHandler {
	static function load_dep_init() {
		require("/core/configs/constants.php");
		require("/vendor/libraries/idiorm.php");
		require("/core/libraries/views.php");
	}
}
