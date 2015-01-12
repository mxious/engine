<?php

require("/core/bootstrap.php");

class BootstrapperTester extends PHPUnit_Framework_TestCase
{
  public function test_dep_handler() {
    $dependencies = New DependencyHandler;
    $result = $dependencies::load_dep_init();
  }
}
    
