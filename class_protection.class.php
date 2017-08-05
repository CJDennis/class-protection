<?php
trait ClassProtection {
  public function __get($name) {
    $class_name = get_called_class();
    trigger_error("Public property {$class_name}::\${$name} does not exist", E_USER_ERROR); }
  // The closing brace is on the previous line to get 100% coverage in PHPUnit 4.8

  public function __set($name, $value) {
    $class_name = get_called_class();
    trigger_error("Public property {$class_name}::\${$name} does not exist and automatic creation has been disabled", E_USER_ERROR); }
  // The closing brace is on the previous line to get 100% coverage in PHPUnit 4.8
}
