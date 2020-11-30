<?php

namespace Rudashi\Contracts;

use ArrayAccess;

interface ArrayableInterface extends ArrayAccess
{
    /**
     * Return items as a plain array.
     *
     * @return array
     */
    public function toArray(): array;

}