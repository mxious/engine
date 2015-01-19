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

    public function test_test() {
        $int = 5;
        $this->assertEquals($int, 5);
    }

}
