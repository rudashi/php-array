<?php

namespace Rudashi;

abstract class EnumeratedValues 
{

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
        
    }

}