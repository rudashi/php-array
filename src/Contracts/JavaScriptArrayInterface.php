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

    public function entries();
    public function every();
    public function fill();
    public function filter();
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