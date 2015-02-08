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
* @version 0.0.3-prealpha
*
*/

# Require core files
require('vendor/autoload.php');
require("app/libraries/apiutils.php");
require("app/configs/constants.php");

header('Content-Type: application/json');

# Instance Slim
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$utils = new ApiUtils;

define('FILE_VERIFICATION', true);

// Authentication. If set to true, all requests REQUIRE an API signature. 
// Disable this for development environments.
if (Constants::AUTHENTICATION) {
	require("app/middleware/Auth.php");
	$app->add(new AuthMiddleware);
}

// Configure Idiorm with database constants
$host = Constants::DATABASE_HOST;
$dbname = Constants::DATABASE_NAME;
ORM::configure([
	"connection_string" => "mysql:host={$host};dbname={$dbname}",
	"username" => Constants::DATABASE_USER,
	"password" => Constants::DATABASE_PASSWORD
	]);


# Debug mode on.
$app->config("debug", true);

use Madcoda\Youtube;
$youtube = new Youtube(array('key' => Constants::API_KEY_YT));

# Start routes!
require('app/assets/routes.php'); 

# Run the app, with the middleware and everything.
$app->run();