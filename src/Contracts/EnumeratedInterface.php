<?php

namespace Rudashi\Contracts;

use Countable;
use IteratorAggregate;

interface EnumeratedInterface extends ArrayableInterface, Countable, IteratorAggregate
{

    /**
     * Get all items in the `array`.
     *
     * @return array
     */
    public function all(): array;

}