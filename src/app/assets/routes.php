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

if (!defined('FILE_VERIFICATION')) die("Direct script access not allowed");

$app->get('/', function () use ($utils, $app) {
    echo $utils::api_msg('Welcome to the Mxious API.');
});

$app->get('/song/:id', function ($id) use ($utils, $app) {
	if (is_numeric($id)) {	
	    $song = ORM::for_table('songs')->where('id', $id)->find_array();

	    if (empty($song)) {
	    	$app->response->setStatus(404);
	    } else {
	    	$response = $song[0];
	    	echo json_encode($response, JSON_PRETTY_PRINT);
	    }

	} else {
		$app->response->setStatus(400);
	}
});

$app->get('/album/:id', function ($id) use ($utils, $app) {
	if (is_numeric($id)) {	
	    $album = ORM::for_table('albums')->where('id', $id)->find_array();

	    if (empty($album)) {
	    	$app->response->setStatus(404);
	    } else {
	    	$songs = ORM::for_table('songs')->where('album', $id)->find_array();
	    	$album[0]['songs'] = $songs;
	    	$result = $album[0];

	    	echo json_encode($result, JSON_PRETTY_PRINT);
	    }
	} else {
		$app->response->setStatus(400);
	}
});

$app->get('/artist/:id', function ($id) use ($utils, $app) {
	if (is_numeric($id)) {
		$artist = ORM::for_table('artists')->where('id', $id)->find_array();

	    if (empty($artist)) {
	    	$app->response->setStatus(404);
	    } else {
	    	$songs = ORM::for_table('songs')->select('id')->select('name')->select('ytid')->where('artist', $id)->find_array();
	    	$albums = ORM::for_table('albums')->select('id')->select('name')->where('artist', $id)->find_array();

	    	$artist[0]['albums'] = $albums;
	    	$artist[0]['songs'] = $songs;
	    	$result = $artist[0];

	    	echo json_encode($result, JSON_PRETTY_PRINT);
	    }
	} else {
		$app->response->setStatus(400);
	}
});

$app->get('/genre/:id', function ($id) use ($utils, $app) {
    $genre = ORM::for_table('genres')->where('id', $id)->find_array();

    if (empty($genre)) {
    	$app->response->setStatus(404);
    } else {
    	$songs = ORM::for_table('songs')->select('id')->select('name')->select('ytid')->where('genre', $genre[0]['id'])->find_array();

    	$genre[0]['songs'] = $songs;
    	$result = $genre[0];

    	echo json_encode($result, JSON_PRETTY_PRINT);
    }

});

$app->post('/song/add', function () use ($utils, $app) {
	$post = $app->request->post();
	if (array_key_exists('name', $post) && array_key_exists('artist', $post) && array_key_exists('album', $post) && array_key_exists('ytid', $post)) {
		$song = ORM::for_table('songs')->create();
		$song->name = $post['name'];
	}
});

$app->get('/aql/:query', function ($query) use ($utils, $app) {
	// Custom Alphasquare Query Language implementation
});

$app->get('/search/:query', function ($query) use ($utils, $app) {

	$result1 = ORM::for_table('songs')->select('name')->select('description')->where_like('name', "%{$query}%")->find_array();
	$return['song_results'] = $result1;
	$result2 = ORM::for_table('artists')->select('name')->select('description')->where_like('name', "%{$query}%")->find_array();
	$return['artist_results'] = $result2;
	$result3 = ORM::for_table('genres')->select('name')->where_like('name', "%{$query}%")->find_array();
	$return['genre_results'] = $result3;
	$result4 = ORM::for_table('albums')->select('name')->select('description')->select('artist')->where_like('name', "%{$query}%")->find_array();
	$return['album_results'] = $result4;

	// Retrieve some metadata.
	// If it matches any in the tables, get songs from artist/album

	$artist_meta = ORM::for_table('artists')->select('id')->where('name', $query)->find_array();
	if (!empty($artist_meta)) {
		$result = ORM::for_table('albums')->select('name')->select('description')->select('artist')->where('artist', $artist_meta[0]['id'])->find_array();
		$return['album_results'] = array_merge($return['album_results'], $result);
	}

	$album_meta = ORM::for_table('albums')->select('id')->where('name', $query)->find_array();
	if (!empty($album_meta)) {
		$result = ORM::for_table('songs')->select('name')->select('description')->select('artist')->where('album', $album_meta[0]['id'])->find_array();
		$return['song_results'] = array_merge($return['song_results'], $result);
	}

	echo json_encode($return, JSON_PRETTY_PRINT);
});

//$app->get('/info', function () use ($utils, $app) {
//    echo json_encode();
//});
