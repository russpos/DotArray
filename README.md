# DotArray

Simple utility for extracting keys from an array using a dot notation.

```php
<?php
    $value = DotArray\Extract::keyFromArray('a.b.c', ['a' => ['b'=> ['c' => 'hello world']]]);
    echo $value; // 'hello world';
```

The API is minimal.  If any part of the nested keys are missing or can't be traversed, the function
will return `null` with no errors.

## Installing.

This package is setup as a composer package for easy inclusion in your projects.

## Contributing.

To contributor, please add additional tests. To run the test suite, just install all the dependencies using
`composer` and then run:

```
$ composer run-script test
```


