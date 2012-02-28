<?php

/**
 * @todo: like Python's collections.Counter 
 * @see http://docs.python.org/library/collections.html#collections.Counter
 * @see http://www.doughellmann.com/PyMOTW/collections/counter.html
 *
 * @todo: Describe more...
 */
class Counter implements ArrayAccess, Iterator
{
    /**
     *
     * @see
     * http://docs.python.org/library/collections.html#collections.Counter
     */
    public function __construct($counts = null)
    {
        if (is_array($counts) && array_values($counts) === $counts)
        {
            // indexed (not associative) array
            $this->counts = new ArrayObject();

            foreach ($counts as $item)
            {
                $this[$item] += 1;
            }
        }
        else if (is_string($counts))
        {
            for ($i = 0; $i < strlen($counts); $i++)
            {
                $this[$counts[$i]] += 1;
            }
        }
        else if (is_array($counts))
        {
            // associative array
            $this->counts = new ArrayObject($counts);
        }
        else
        {
            $this->counts = new ArrayObject();
        }
    }

    public function offsetExists($offset)
    {
        return isSet($this->counts[$offset]);
    }

    public function offsetGet($offset)
    {
        if (isSet($this->counts[$offset]))
        {
            return $this->counts[$offset];
        }

        return 0;
    }

    public function offsetSet($offset, $value)
    {
        $this->counts[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->counts[$offset]);
    }

    public function current()
    {
        return $this->iterator->current();
    }

    public function key()
    {
        return $this->iterator->key();
    }

    public function next()
    {
        return $this->iterator->next();
    }

    public function rewind()
    {
        $this->iterator = $this->counts->getIterator();
    }

    public function valid()
    {
        return $this->iterator->valid();
    }

    public function getArray()
    {
        return (array) $this->counts;
    }

    /**
     *
     * @see
     * http://docs.python.org/library/collections.html#collections.Counter.elements
     */
    public function elements()
    {
        $result = array();

        foreach ($this->counts as $elem => $count)
        {
            for ($i = 0; $i < $count; $i++)
            {
                $result[] = $elem;
            }
        }

        return $result;
    }

    /**
     *
     * @see
     * http://docs.python.org/library/collections.html#collections.Counter.most_common
     */
    public function mostCommon($num)
    {
        $array = $this->getArray();
        arsort($array);
        $slice = array_slice($array, 0, $num);

        $result = array();

        foreach ($slice as $key => $value)
        {
            $result[] = array($key, $value);
        }

        return $result;
    }

    /**
     * @todo Implement
     * @see
     * http://docs.python.org/library/collections.html#collections.Counter.update
     */
    public function update(array $arr)
    {
        foreach ($arr as $elem => $count)
        {
            $this[$elem] += $count;
        }
    }

    /**
     * @todo Implement
     * @see
     * http://docs.python.org/library/collections.html#collections.Counter.subtract
     */
    public function subtract(array $arr)
    {
        foreach ($arr as $elem => $count)
        {
            $this[$elem] -= $count;
        }
    }

    private /* ArrayObject */ $counts;
    private /* ArrayObjectIterator */ $iterator;

} // class Counter

// vim: expandtab:noai:ts=4:sw=4
