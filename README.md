# class-protection
Prevent auto-creation of public properties on your classes

Usage:

```php
<?php
require_once 'class_protection.class.php';

class MyClass {
  use ClassProtection;

  // Remainder of class code
}
```

It is now no longer possible to dynamically create new `public` properties
at run-time from either inside or outside the class `MyClass`,
but any existing `public` properties can still be accessed and changed.
All `public` properties must now be declared before they're used,
just like `protected` and `private` properties.

That's it!

One caveat: `unset()` can still be called on public properties and delete them from the object.
It's best to completely avoid using public properties for a robust class with locked-down behaviour.
