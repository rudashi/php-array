<?php

use Rudashi\Map;
use Rudashi\Collection;

if (!function_exists('collect')) {
    /**
     * Create a collection from the given value.
     *
     * @param  mixed  $value
     * @return Collection
     */
    function collect($value = null): Collection
    {
        return new Collection($value);
    }
}

if (!function_exists('map')) {
    /**
     * Create a Map from the given value.
     *
     * @param  mixed  $value
     * @return Map
     */
    function map($value = null): Map
    {
        return new Map($value);
    }
}
