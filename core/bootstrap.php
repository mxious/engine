<?php
session_start();

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

try {
	# Require necessary classes.
	require("/core/configs/constants.php");
	require("/vendor/libraries/idiorm.php");
	require("/core/libraries/views.php");
	

	switch (Constants::SITE_MODE) {
		case 'development':
			error_reporting(E_ALL);
			ini_set('display_errors', '1');
			break;
		
		case 'production':
			error_reporting(0);
			ini_set('display_errors', '0');
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
ORM::configure('mysql:host='.Constants::DATABASE_HOST.';dbname='.Constants::DATABASE_NAME);
ORM::configure('username', Constants::DATABASE_USER);
ORM::configure('password', Constants::DATABASE_PASSWORD);

/*

	Everything has been loaded.
	No thermonuclear war has happened, hopefully.
	Do good, not evil.

	$cats_saved = 45;

 */

