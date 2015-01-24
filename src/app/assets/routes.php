<?php

# Routes Include

$app->get('/', function () use ($utils, $app) {
    echo $utils::api_msg('Welcome to the Mxious API. Resources here require authentication, please authenticate before entering any other resource to prevent potential issues with your application.');
});
