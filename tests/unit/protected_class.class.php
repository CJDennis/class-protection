<?php
require_once 'class_protection.class.php';

class ProtectedClass {
  use ClassProtection;

  public $foo = 1;
  protected $bar = 2;
  private $baz = 3;
}
