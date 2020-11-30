<?php

namespace Rudashi\Contracts;

interface JavaScriptArrayInterface
{

    public function of();
    public function concat();
    public function copyWithin();
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
    public function keys();
    public function lastIndexOf();

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
    public function values();

}