<?php

namespace Rudashi;

use Traversable;
use Rudashi\Traits\Arrayable;
use Rudashi\Traits\CanIterable;
use Rudashi\Contracts\ArrayableInterface;
use Rudashi\Contracts\EnumeratedInterface;

class EnumeratedValues implements EnumeratedInterface
{

    use Arrayable,
        CanIterable;

    /**
     * The items contained in the `array`.
     *
     * @var array
     */
    protected $items = [];

    /**
     * Create a new `array`.
     *
     * @param  mixed  $items
     * @return void
     */
    public function __construct($items = [])
    {
        $this->items = $this->getArray($items);
    }

    /**
     * Results a plain array of items.
     *
     * @param  mixed  $items
     * @return array
     */
    private function getArray($items): array
    {
        switch (true) {
            case is_array($items):
                return $items;
            case $items instanceof EnumeratedInterface:
                return $items->all();
            case $items instanceof Traversable:
                return iterator_to_array($items);
            default:
                return $items !== null ? [$items] : [];
        }
    }

    /**
     * Get all of the items in the collection.
     *
     * @return array
     */
    public function all(): array
    {
        return $this->items;
    }

    /**
     * Get all of the items in the collection as a plain array.
     *
     * @return array
     */
    public function toArray(): array
    {
        return $this->map(function ($value) {
            return $value instanceof ArrayableInterface ? $value->toArray() : $value;
        })->all();
    }

}