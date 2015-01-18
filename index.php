<?php
session_start();

require('vendor/Slim/Slim.php');
require("app/libraries/apiutils.php");
require("app/configs/constants.php");

// Remember headers
header('Content-Type: application/json');

// Tip: instead of typing the full header, do http_response_code(404); with the response code you need.


\Slim\Slim::registerAutoloader();

try {
    switch (Constants::SITE_MODE) {
        case 'development':
            error_reporting(E_ALL);
            break;
        
        case 'production':
            error_reporting(0);
            break;
        default:
            throw new Exception("Site mode is not set.");
            break;  
    }
} catch(Exception $e) {
    echo $e->getMessage();
    die("Could not start the API.");
}


$app = new \Slim\Slim();
$utils = new ApiUtils;

$app->get('/', function () use ($utils) {
    echo $utils::api_msg('Welcome to the Mxious API. Resources here require authentication, please authenticate before entering any other resource to prevent potential issues with your application.');
});

$app->run();
