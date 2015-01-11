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

<<<<<<< HEAD
try {
	# Require necessary classes.
	if (!@require("config/constants.php")) {
		throw new Exception("Constants file not found.");
	}
	if (!@require("../vendor/libraries/idiorm.php")) {
		throw new Exception("Idiorm ORM not found.");	
	}

	switch (Constants::SITE_MODE) {
		case 'development':
			error_reporting(E_ALL);
			break;
=======
namespace Mxious;

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
>>>>>>> 5de079b0c754a5d2be035f79eb5a050c8bd8842e
		
		case 'production':
			error_reporting(0);
			break;

		default:
			throw new Exception("Site mode is not set.");
			break;	
	}
} catch(Exception $e) {
	echo $e->getMessage();
	die("Could not start the MxiousEngine.");
}

# Start Idiorm ORM Configuration
ORM::configure('mysql:host='.Constants::DATABASE['dbname'].';dbname='.Constants::DATABASE['dbname']);
ORM::configure('username', Constants::DATABASE['username']);
ORM::configure('password', Constants::DATABASE['password']);

/*

	Everything has been loaded.
	No thermonuclear war has happened, hopefully.
	Do good, not evil.

	$cats_saved = 45;

 */

