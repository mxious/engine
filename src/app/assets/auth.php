<?php

use QueryAuth\Credentials\Credentials;
use QueryAuth\Factory;
use QueryAuth\Request\Adapter\Incoming\SlimRequestAdapter;

$factory = new Factory();
$requestValidator = $factory->newRequestValidator();
$credentials = new Credentials('key', 'secret');
$request = $app->request;
$isValid = $requestValidator->isValid(new SlimRequestAdapter($request), $credentials);
