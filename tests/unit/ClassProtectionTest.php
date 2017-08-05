<?php
require_once 'protected_class.class.php';

class ClassProtectionTest extends \Codeception\Test\Unit {
  /**
   * @var \UnitTester
   */
  protected $tester;

  protected function _before() {
  }

  protected function _after() {
  }

  // tests
  public function testShouldAccessAnExistingPublicProperty() {
    $protected_class = new ProtectedClass;
    $this->assertSame(1, $protected_class->foo);
  }

  public function testShouldSetAnExistingPublicProperty() {
    $protected_class = new ProtectedClass;
    $protected_class->foo = 42;
    $this->assertSame(42, $protected_class->foo);
  }

  public function testShouldGenerateAFatalErrorWhenAccessingAnExistingProtectedProperty() {
    $protected_class = new ProtectedClass;
    $this->tester->expectException('Exception', function () use ($protected_class) {
      $dummy = $protected_class->bar;
    });
  }

  public function testShouldGenerateAFatalErrorWhenSettingAnExistingProtectedProperty() {
    $protected_class = new ProtectedClass;
    $this->tester->expectException('Exception', function () use ($protected_class) {
      $protected_class->bar = 42;
    });
  }

  public function testShouldGenerateAFatalErrorWhenAccessingAnExistingPrivateProperty() {
    $protected_class = new ProtectedClass;
    $this->tester->expectException('Exception', function () use ($protected_class) {
      $dummy = $protected_class->baz;
    });
  }

  public function testShouldGenerateAFatalErrorWhenSettingAnExistingPrivateProperty() {
    $protected_class = new ProtectedClass;
    $this->tester->expectException('Exception', function () use ($protected_class) {
      $protected_class->baz = 42;
    });
  }

  public function testShouldGenerateAFatalErrorWhenAccessingANonExistentPublicProperty() {
    $protected_class = new ProtectedClass;
    $this->tester->expectException('Exception', function () use ($protected_class) {
      $dummy = $protected_class->qux;
    });
  }

  public function testShouldGenerateAFatalErrorWhenSettingANonExistentPublicProperty() {
    $protected_class = new ProtectedClass;
    $this->tester->expectException('Exception', function () use ($protected_class) {
      $protected_class->qux = 42;
    });
  }
}
