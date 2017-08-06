<?php
require_once 'protected_class.class.php';

class ClassProtectionCoverageTest extends \Codeception\Test\Unit {
  /**
   * @var \UnitTester
   */
  protected $tester;

  protected function _before() {
    set_error_handler(function () { return true; });
  }

  protected function _after() {
    restore_error_handler();
  }

  // tests
  public function testShouldCoverTheClosingBraceOfTheMagicFunctionGet() {
    $protected_class = new ProtectedClass;
    $dummy = $protected_class->qux;
    $this->assertTrue(true);
  }

  public function testShouldCoverTheClosingBraceOfTheMagicFunctionSet() {
    $protected_class = new ProtectedClass;
    $protected_class->qux = 42;
    $this->assertTrue(true);
  }
}
