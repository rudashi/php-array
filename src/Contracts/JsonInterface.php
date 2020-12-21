<?php

namespace Rudashi\Contracts;

use JsonSerializable;

interface JsonInterface extends JsonSerializable
{

    /**
     * Parses a JSON string to an object, array or value.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/JSON/parse
     *
     * @param $value
     * @param bool $associative
     * @return mixed
     */
    public static function parse($value, bool $associative = false);

    /**
     * Converts a object, array or value to a JSON string.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/JSON/stringify
     *
     * @param $value
     * @param int $options
     * @return mixed
     */
    public static function stringify($value, int $options = 0);

}