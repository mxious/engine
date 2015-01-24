<?php

require_once('vendor/autoload.php');

use QueryAuth\Credentials\Credentials;
use QueryAuth\Factory;
use QueryAuth\Request\Adapter\Incoming\SlimRequestAdapter;

class AuthenticationMiddleware extends \Slim\Middleware {

    public function call() {
        // Get instance to application
        $app = $this->app;

        // Run middleware
        $this->next->call();

        $factory = new Factory();
        $requestValidator = $factory->newRequestValidator();
        $credentials = new Credentials('key', 'secret');
        $request = $app->request;
        $isValid = $requestValidator->isValid(new SlimRequestAdapter($request), $credentials);
    }

    public function get_method_array() {
        $app = $this->app;
        $type = $app->request->getMethod();

        switch ($type) {
            case 'POST':
             return $_POST;
            break;

            case 'GET':
             return $_GET;
            break;
        }
    }

}

