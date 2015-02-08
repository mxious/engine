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

if (!defined('FILE_VERIFICATION')) die("Direct script access not allowed");

use QueryAuth\Credentials\Credentials;
use QueryAuth\Factory;
use QueryAuth\Request\Adapter\Incoming\SlimRequestAdapter;

$factory = new Factory();
$requestValidator = $factory->newRequestValidator();
$credentials = new Credentials('key', 'secret');
$request = $app->request;
$isValid = $requestValidator->isValid(new SlimRequestAdapter($request), $credentials);
