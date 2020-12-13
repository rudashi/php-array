<?php

namespace Rudashi\Contracts;

use Rudashi\Exceptions\TypeError;

interface JavaScriptArrayInterface
{

    /**
     * Creates a new map instance.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/from
     *
     * @param mixed $items
     * @param callable|null $callback
     * @return static
     * @throws TypeError
     */
    public static function from($items = null, callable $callback = null);

    /**
     * Determines whether the passed value is an Array.
     * https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/isArray
     *
     * @param mixed $items
     * @return bool
     */
    public static function isArray($items): bool;

    /**
     * Creates a new map instance from arguments.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/of
     *
     * @param mixed ...$items
     * @return static
     */
    public static function of(array ...$items);

    /**
     * Merge two or more arrays to new map instance.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/concat
     *
     * @param mixed ...$elements
     * @return static
     */
    public function concat(...$elements);

    /**
     * Returns a new array that contains the key/value pairs of map
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/entries
     *
     * @return array
     */
    public function entries(): array;

    /**
     * Determine if all items pass the test implemented by callback test.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/every
     * @param  callable  $callback
     * @return bool
     */
    public function every(callable $callback): bool;

    /**
     * Returns a new map with changes all items, from a start index to an end index.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/fill
     *
     * @param mixed $value
     * @param int|null $start
     * @param int|null $end
     * @return static
     */
    public function fill($value, int $start = null, int $end = null);

    /**
     * Returns a new map with all items that pass the test implemented by callback.
     * If no callback is passed, all values which are empty, null or false will be removed.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/filter
     *
     * @param callable|null $callback
     * @param bool $reset_keys
     * @return static
     */
    public function filter(callable $callback = null, bool $reset_keys = false);

    public function find();
    public function findIndex();
    public function flat();
    public function flatMap();
    public function forEach();
    public function includes();
    public function indexOf();
    public function join();

    /**
     * Returns a new Map that contains the keys.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/keys
     *
     * @return static
     */
    public function keys();
    public function lastIndexOf();

    /**
     * Returns a new Map as a result of passed function on every item.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/map
     *
     * @param callable $callback
     * @return static
     */
    public function map(callable $callback);

    public function pop();

    public function push(...$elements);

    public function reduce();
    public function reduceRight();
    public function reverse();
    public function shift();
    public function slice();
    public function some();
    public function sort();
    public function splice();
    public function toLocaleString();
    public function toSource();
    public function toString();
    public function unshift();

    /**
     * Returns a new Map that contains the values with reset keys.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array/values
     *
     * @return static
     */
    public function values();

}