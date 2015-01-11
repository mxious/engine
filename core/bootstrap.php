<?php

/**
 * Mxious Bootstrapper
 * 
 * This is the Mxious bootstrapper. Loads all configs.
 * 
 * @author Alphapixels
 * @category Config files
 * @version 0.0.1pre-alpha
 * 
 */

# Require necessary classes
require("config/constants.php");
require("config/database.php");

switch (Mxious_Defines::SITE_MODE) {
	case 'development':
		error_reporting(E_ALL);
		break;
	
	case 'production':
		error_reporting(0);
		break;

	default:
		throw new Exception("Site mode is not set. Falling back to development.");
		break;
		
}
