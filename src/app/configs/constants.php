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

class Constants {

	// The site's url. Start this with http:// prefix and trailing slash.
	const BASE_URL = "http://localhost/";
	
	// This program has CDN support. If you use a CDN, place the URL to the CDN here, and USE_CDN to true.
	const USE_CDN = false;
	const CDN_URL = 'https://cdn.example.com/';


	// Site mode. Pretty self explanatory. If site mode is production, errors will be silenced.
	// Types:
	// closed = dies
	// production = silences errors
	// development = displays errors
	
	const SITE_MODE = 'development';



	// Place any other constants you need throughout the application after this line.
	// Example:
	// const FACEBOOK_APIKEY = "apikey1234";
	// const TWITTER_APIKEY = "apikey1234";

	// Database constant. Fill this out to use the Idiorm ORM (required)
	const DATABASE_NAME = "mxious";
	const DATABASE_USER = "root";
	const DATABASE_PASSWORD = "";
	const DATABASE_HOST = "localhost";
}
