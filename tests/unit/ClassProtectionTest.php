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
  // __get()
  public function testShouldAccessAnExistingPublicProperty() {
    $protected_class = new ProtectedClass;
    $this->assertSame(1, $protected_class->foo);
  }

  public function testShouldGenerateAFatalErrorWhenAccessingAnExistingProtectedProperty() {
    $protected_class = new ProtectedClass;
    $this->tester->expectException('Exception', function () use ($protected_class) {
      $dummy = $protected_class->bar;
    });
  }

  public function testShouldGenerateAFatalErrorWhenAccessingAnExistingPrivateProperty() {
    $protected_class = new ProtectedClass;
    $this->tester->expectException('Exception', function () use ($protected_class) {
      $dummy = $protected_class->baz;
    });
  }

  public function testShouldGenerateAFatalErrorWhenAccessingANonExistentPublicProperty() {
    $protected_class = new ProtectedClass;
    $this->tester->expectException('Exception', function () use ($protected_class) {
      $dummy = $protected_class->qux;
    });
  }

  // __set()
  public function testShouldSetAnExistingPublicProperty() {
    $protected_class = new ProtectedClass;
    $protected_class->foo = 42;
    $this->assertSame(42, $protected_class->foo);
  }

  public function testShouldGenerateAFatalErrorWhenSettingAnExistingProtectedProperty() {
    $protected_class = new ProtectedClass;
    $this->tester->expectException('Exception', function () use ($protected_class) {
      $protected_class->bar = 42;
    });
  }

  public function testShouldGenerateAFatalErrorWhenSettingAnExistingPrivateProperty() {
    $protected_class = new ProtectedClass;
    $this->tester->expectException('Exception', function () use ($protected_class) {
      $protected_class->baz = 42;
    });
  }

  public function testShouldGenerateAFatalErrorWhenSettingANonExistentPublicProperty() {
    $protected_class = new ProtectedClass;
    $this->tester->expectException('Exception', function () use ($protected_class) {
      $protected_class->qux = 42;
    });
  }

  // __isset()
  public function testShouldReturnTrueForAnExistingSetPublicProperty() {
    $protected_class = new ProtectedClass;
    $this->assertTrue(isset($protected_class->foo));
  }

  public function testShouldReturnFalseForAnExistingSetProtectedProperty() {
    $protected_class = new ProtectedClass;
    $this->assertFalse(isset($protected_class->bar));
  }

  public function testShouldReturnFalseForAnExistingSetPrivateProperty() {
    $protected_class = new ProtectedClass;
    $this->assertFalse(isset($protected_class->baz));
  }

  public function testShouldReturnFalseForANonExistingSetPublicProperty() {
    $protected_class = new ProtectedClass;
    $this->assertFalse(isset($protected_class->qux));
  }

  //// __unset()
  //// Unfortunately, PHP only seems to call __unset() when the named public property doesn't exist,
  //// making it useless for this purpose
  //public function testShouldGenerateAFatalErrorWhenUnsettingAnExistingPublicProperty() {
  //  $protected_class = new ProtectedClass;
  //  $this->tester->expectException('Exception', function () use ($protected_class) {
  //    unset($protected_class->foo);
  //  });
  //}
  //
  //public function testShouldGenerateAFatalErrorWhenUnsettingAnExistingProtectedProperty() {
  //  $protected_class = new ProtectedClass;
  //  $this->tester->expectException('Exception', function () use ($protected_class) {
  //    unset($protected_class->bar);
  //  });
  //}
  //
  //public function testShouldGenerateAFatalErrorWhenUnsettingAnExistingPrivateProperty() {
  //  $protected_class = new ProtectedClass;
  //  $this->tester->expectException('Exception', function () use ($protected_class) {
  //    unset($protected_class->baz);
  //  });
  //}
  //
  //public function testShouldGenerateAFatalErrorWhenUnsettingANonExistingPublicProperty() {
  //  $protected_class = new ProtectedClass;
  //  $this->tester->expectException('Exception', function () use ($protected_class) {
  //    unset($protected_class->qux);
  //  });
  //}
}
