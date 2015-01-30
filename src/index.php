<?php
session_start();

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
* @version 0.0.3-prealpha
*
*/


# Require core files
require('vendor/autoload.php');
require("app/libraries/apiutils.php");
require("app/configs/constants.php");
header('Content-Type: application/json');

# Get QueryAuth (authentication) namespace into our scope
use QueryAuth\Credentials\Credentials;
use QueryAuth\Factory;
use QueryAuth\Request\Adapter\Incoming\SlimRequestAdapter;

# Instance Slim
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$utils = new ApiUtils;

# Debug mode on.
$app->config("debug", true);

# Authentication code, decide if to die & return a 401, or a 200 OK.
$factory = new Factory();
$requestValidator = $factory->newRequestValidator();
$credentials = new Credentials('hAlAhUIPDtYIx4MgFcEijGQsukPGydAka3d6jTQ1', 'o9NIFMSbIIp9qMgGMcQOIRHnqYyUgIcKx0gpBTqisG8Ll67n4hTyRDd/Nvk2');
$request = $app->request;

# Catch issues in validation. Ignore them, else the app will die, this isn't done yet.
try {
	$check = $requestValidator->isValid(new SlimRequestAdapter($request), $credentials);
	if (!$check) {
		http_response_code(401);
		die("HTTP/1.1 401 Unauthorized");
	}
} catch (Exception $e) {
	die($utils::api_msg($e->getMessage()));
}

# Start routes!
require('app/assets/routes.php'); 

# Run the app, with the middleware and everything.
$app->run();