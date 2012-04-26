# PHP_Counter


## Summary

A PHP port of Python's [collections.Counter class](http://docs.python.org/library/collections.html#counter-objects).


## Author

[Marc Abramowitz](http://marc-abramowitz.com/)


## Build status

[![Build Status](https://secure.travis-ci.org/msabramo/PHP_Counter.png?branch=master)](http://travis-ci.org/msabramo/PHP_Counter)


## Examples

```php
<?php

$counter = new Counter();

$counter['a'] += 1;
$counter['b'] += 1;
$counter['a'] += 1;
$counter['b'] += 1;
$counter['c'] += 1;
$counter['a'] += 1;
$counter['a'];  // --> 3
$counter['b'];  // --> 2
$counter['c'];  // --> 1

$counter->mostCommon(2);  // --> array('a' => 3, 'b' => 2)
```

For the most up-to-date usage information, I suggest looking at [the
tests](/msabramo/PHP_Counter/blob/master/tests/CounterTest.php).


### Running the tests

Here's how to run [the tests](/msabramo/PHP_Counter/blob/master/tests/CounterTest.php).

```
~/dev/git-repos/PHP_Counter$ phpunit --testdox .
PHPUnit 3.6.3 by Sebastian Bergmann.

Counter
 [x] Counter constructor with no args
 [x] Counter constructor with array
 [x] Counter constructor with string
 [x] Increment
 [x] Get array
 [x] Most common
 [x] Unset
 [x] Missing element
 [x] Elements method
 [x] Update
 [x] Subtract
 ```
