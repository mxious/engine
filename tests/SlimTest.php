<?php

class MxiousTest extends PHPUnit_Framework_TestCase {

    public function setup() {
        unset($_ENV['SLIM_MODE']);

        $_SESSION = array();

        \Slim\Environment::mock(array(
            'SCRIPT_NAME' => '/foo', 
            'PATH_INFO' => '/bar', 
            'QUERY_STRING' => 'one=foo&two=bar',
            'SERVER_NAME' => 'localhost',
        ));
    }

    public function testphpunit() {
        $int = 5;
        $this->assertEquals($int, 5);
    }

   public function request($method, $path, $options = array()) {
        ob_start();
        $app = new \Slim\Slim();
        $this->app = $app;
        $this->request = $app->request();
        $this->response = $app->response();
        return ob_get_clean();
    }

    public function get($path, $options = array()) {
        $this->request('GET', $path, $options);
    }

    public function testIndex() {
        $this->get('/');
        $this->assertEquals('200', $this->response->status());
    }

}
