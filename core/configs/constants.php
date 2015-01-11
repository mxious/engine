<?php

/**
 * Mxious Defines File
 * 
 * This is your main defines file. Please fill out the following defines for proper functioning of the Mxious source.
 * 
 * @author Alphapixels
 * @category Config files
 * @version 0.0.1pre-alpha
 * 
 */

class Constants {

	// The site's url. Start this with http:// prefix and trailing slash.
	const BASE_URL = "http://example.com/";

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

