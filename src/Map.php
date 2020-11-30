<?php

namespace Rudashi;

use Rudashi\Traits\CanEnumerated;
use Rudashi\Contracts\JavaScriptArrayInterface;

/**
 * @property-read int|null $length
 */
class Map extends EnumeratedValues implements JavaScriptArrayInterface
{

    use CanEnumerated;

    private $length;

    public function of()
    {

    }

    public function concat()
    {

    }

    public function copyWithin()
    {

    }

    public function entries()
    {

    }

    public function every()
    {

    }

    public function fill()
    {

    }

    public function filter()
    {

    }

    public function find()
    {

    }

    public function findIndex()
    {

    }

    public function flat()
    {

    }

    public function flatMap()
    {

    }

    public function forEach()
    {

    }

    public function includes()
    {

    }

    public function indexOf()
    {

    }

    public function join()
    {

    }

    public function keys()
    {

    }

    public function lastIndexOf()
    {

    }

    public function map(callable $callback): Map
    {
        return parent::map($callback);
    }

    public function pop()
    {

    }

    public function reduce()
    {

    }

    public function reduceRight()
    {

    }

    public function reverse()
    {

    }

    public function shift()
    {

    }

    public function slice()
    {

    }

    public function some()
    {

    }

    public function sort()
    {

    }

    public function splice()
    {

    }

    public function toLocaleString()
    {

    }

    public function toSource()
    {

    }

    public function toString()
    {

    }

    public function unshift()
    {

    }

    public function values()
    {

    }

    public function __get($name)
    {
        if ($name === 'length') {
            return $this->count();
        }
    }

}