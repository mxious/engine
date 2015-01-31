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

# Instance Slim
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
$utils = new ApiUtils;

require("app/middleware/Auth.php");
$app->add(new AuthMiddleware);

# Debug mode on.
$app->config("debug", true);

# Start routes!
require('app/assets/routes.php'); 

# Run the app, with the middleware and everything.
$app->run();