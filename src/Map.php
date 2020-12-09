<?php

namespace Rudashi;

use Rudashi\Exceptions\TypeError;
use Rudashi\Traits\CanEnumerated;
use Rudashi\Contracts\JavaScriptArrayInterface;

/**
 * @property-read int|null $length
 */
class Map extends EnumeratedValues implements JavaScriptArrayInterface
{

    use CanEnumerated;

    private $length;

    /**
     * Creates a new map instance.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/from
     *
     * @param mixed $items
     * @param callable|null $callback
     * @return static
     * @throws TypeError
     */
    public static function from($items = null, callable $callback = null): self
    {
        if (is_string($items)) {
            $items = str_split($items);
        }
        if (is_int($items) && $items > -1) {
            $items = range(0, $items - 1);
        }
        if (is_array($items)) {
            return $callback ? (new self($items))->map($callback) : new self($items);
        }
        if ($items instanceof self) {
            return $callback ? $items->map($callback) : $items;
        }
        throw new TypeError(gettype($items).' is not iterable');
    }

    /**
     * Determines whether the passed value is an Array.
     * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/isArray
     *
     * @param mixed $items
     * @return bool
     */
    public static function isArray($items): bool
    {
        return is_array($items);
    }

    /**
     * Creates a new map instance from arguments.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/of
     *
     * @param mixed ...$items
     * @return static
     */
    public static function of(...$items): self
    {
        return new static($items);
    }

    /**
     * Merge two or more arrays to new map instance.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/concat
     *
     * @param mixed ...$elements
     * @return static
     */
    public function concat(...$elements): self
    {
        $result = new static($this);

        foreach ($elements as $args) {
            if ($args instanceof self) {
                foreach ($args as $item) {
                    $result->push($item);
                }
            } else {
                foreach ((array) $args as $item) {
                    $result->push($item);
                }
            }
        }
        return $result;
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

    /**
     * Returns a new Map that contains the keys.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/keys
     *
     * @return static
     */
    public function keys(): self
    {
        return new static(array_keys($this->items));
    }

    public function lastIndexOf()
    {

    }

    /**
     * Returns a new Map as a result of passed function on every item.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/map
     *
     * @param callable $callback
     * @return static
     */
    public function map(callable $callback): self
    {
        $keys = array_keys($this->items );
        $elements = array_map($callback, $this->items, $keys);

        return new static(array_combine($keys, $elements) ?: []);
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

    /**
     * Returns a new Map that contains the values with reset keys.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/values
     *
     * @return static
     */
    public function values(): self
    {
        return new static(array_values($this->items));
    }

    public function __get($name)
    {
        if ($name === 'length') {
            return $this->count();
        }
    }

}