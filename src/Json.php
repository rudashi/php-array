<?php

namespace Rudashi;

use JsonException;
use JsonSerializable;
use Rudashi\Exceptions\JSONError;
use Rudashi\Contracts\ArrayableInterface;
use Rudashi\Contracts\EnumeratedInterface;
use Rudashi\Contracts\JsonInterface;

class Json implements JsonInterface
{

    private $values;

    public function __construct($value)
    {
        $this->values = $value;
    }

    /**
     * Parses a JSON string to an object, array or value.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/JSON/parse
     *
     * @param $value
     * @param bool $associative
     * @return mixed
     */
    public static function parse($value, bool $associative = false)
    {
        try {
            return json_decode($value, $associative, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new JSONError($e->getMessage());
        }
    }

    /**
     * Converts a object, array or value to a JSON string.
     * @link https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/JSON/stringify
     *
     * @param $value
     * @param int $options
     * @return mixed
     */
    public static function stringify($value, int $options = 0)
    {
        try {
            return json_encode(new static($value), JSON_THROW_ON_ERROR | $options);
        } catch (JsonException $e) {
            throw new JSONError($e->getMessage());
        }
    }

    /**
     * Convert the object into something JSON serializable.
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        if ($this->values instanceof EnumeratedInterface) {
            return array_map(static function ($value) {
                if ($value instanceof JsonSerializable) {
                    return $value->jsonSerialize();
                }
                if ($value instanceof ArrayableInterface) {
                    return $value->toArray();
                }
                return $value;
            }, $this->values->all());
        }
        return $this->values;
    }

}