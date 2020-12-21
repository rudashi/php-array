<?php

namespace Tests;

use DateTime;
use Rudashi\Exceptions\JSONError;
use Rudashi\Map;
use Rudashi\Json;
use PHPUnit\Framework\TestCase;

class JsonTest extends TestCase
{

    public function testStringify(): void
    {
        self::assertJsonStringEqualsJsonString('{}', Json::stringify((object) []));
        self::assertJsonStringEqualsJsonString('[]', Json::stringify([]));
        self::assertJsonStringEqualsJsonString('true', Json::stringify(true));
        self::assertJsonStringEqualsJsonString('false', Json::stringify(false));
        self::assertJsonStringEqualsJsonString('"foo"', Json::stringify('foo'));
        self::assertJsonStringEqualsJsonString('[1,"false",false]', Json::stringify([1, 'false', false]));
        self::assertJsonStringEqualsJsonString('[0,"null",null]', Json::stringify([0, 'null', null]));
        self::assertJsonStringEqualsJsonString('{"x":5}', Json::stringify((object) ['x' => 5]));
    }

    public function testExceptions(): void
    {
        $this->expectException(JSONError::class);
        Json::stringify([NAN, null, INF]);
    }

    public function testBypassExceptions(): void
    {
        self::assertJsonStringEqualsJsonString('[0, null, 0]', Json::stringify([NAN, null, INF], JSON_PARTIAL_OUTPUT_ON_ERROR));
    }

    public function testStringifyDate(): void
    {
        $results = new DateTime('2006-01-02 04:05');
        self::assertJsonStringEqualsJsonString('{"date":"2006-01-02 04:05:00.000000","timezone_type":3,"timezone":"UTC"}', Json::stringify($results));
    }

    public function testStringifyArrayOfObject(): void
    {
        $results = Map::from([new Map(['id' => 1, 'name' => 'foo']), 'test' => ['id' => 2, 'name' => 'bar']]);
        self::assertJsonStringEqualsJsonString('{"0":{"id":1,"name":"foo"},"test":{"id":2,"name":"bar"}}', Json::stringify($results));
    }

    public function testParse(): void
    {
        self::assertIsObject(JSON::parse('{}'));
        self::assertTrue(JSON::parse('true'));
        self::assertEquals('foo', JSON::parse('"foo"'));
        self::assertEquals([1, 5, "false"], JSON::parse('[1, 5, "false"]'));
        self::assertNull(JSON::parse('null'));
    }

}
