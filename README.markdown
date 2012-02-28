# PHP_Counter

## Summary

A PHP port of Python's [collections.Counter class](http://docs.python.org/library/collections.html#counter-objects).

## Author

[Marc Abramowitz](http://marc-abramowitz.com/)

## Examples

```
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
tests](PHP_Counter/blob/master/tests/CounterTest.php).
