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

# Routes Include

$app->get('/', function () use ($utils, $app) {
    echo $utils::api_msg('Welcome to the Mxious API. Resources here require authentication, please authenticate before entering any other resource to prevent potential issues with your application.');
});
