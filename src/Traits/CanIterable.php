<?php

namespace Rudashi\Traits;

use ArrayIterator;

trait CanIterable
{

    /**
     * Get an iterator for the items.
     *
     * @return ArrayIterator
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->items);
    }

    /**
     * Count the number of items in the `array`.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

}