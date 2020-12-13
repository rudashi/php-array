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

    /**
     * Returns a new array that contains the key/value pairs of map
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/entries
     *
     * @return array
     */
    public function entries(): array
    {
        return $this->toArray();
    }

    /**
     * Determine if all items pass the test implemented by callback test.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/every
     * @param  callable  $callback
     * @return bool
     */
    public function every(callable $callback): bool
    {
        foreach ($this->items as $key => $item) {
            if ($callback($item, $key) === false) {
                return false;
            }
        }

        return true;
    }

    /**
     * Returns a new map with changes all items, from a start index to an end index.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/fill
     *
     * @param mixed $value
     * @param int|null $start
     * @param int|null $end
     * @return static
     */
    public function fill($value, int $start = null, int $end = null): self
    {
        $result = new static($this);
        $count = $result->count();

        $start >>= 0;
        $end = (is_int($end) === false) ? $count : $end >> 0;

        $relStart = $start < 0 ? max($count + $start, 0) : min($start, $count);
        $relEnd =  $end < 0 ? max($count + $end, 0) : min($end, $count);

        for ($i = $relStart; $i < $relEnd; $i++) {
            $result->set($i, $value);
        }
        return $result;
    }

    /**
     * Returns a new map with all items that pass the test implemented by callback.
     * If no callback is passed, all values which are empty, null or false will be removed.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/filter
     *
     * @param callable|null $callback
     * @param bool $reset_keys
     * @return static
     */
    public function filter(callable $callback = null, bool $reset_keys = false): self
    {
        if ($callback) {
            $items = (array_filter($this->items, $callback, ARRAY_FILTER_USE_BOTH));
        } else {
            $items = array_filter($this->items);
        }
        return new static($reset_keys ? array_values($items) : $items);
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

    /**
     * Get an item from the collection by key.
     *
     * @param  mixed  $key
     * @param  mixed  $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        if (array_key_exists($key, $this->items)) {
            return $this->items[$key];
        }

        return $default instanceof \Closure ? $default() : $default;
    }

    /**
     * Set the item at given key / index
     * @param mixed $key
     * @param mixed $value
     * @return self
     */
    public function set($key, $value): self
    {
        $this->items[$key] = $value;

        return $this;
    }

    public function __get($name)
    {
        if ($name === 'length') {
            return $this->count();
        }
    }

}