<?php
class AuthenticationMiddleware extends \Slim\Middleware {

    public function call() {
        // Get instance to application
        $app = $this->app;

        // Run middleware
        $this->next->call();

        require('vendor/Signature/includes.php');

    }

}