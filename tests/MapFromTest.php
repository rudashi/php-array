<?php

namespace Tests;

use Rudashi\Exceptions\TypeError;
use Rudashi\Map;
use PHPUnit\Framework\TestCase;

class MapFromTest extends TestCase
{

    public function testStaticFromString(): void
    {
        $string = 'foo';
        $map = Map::from($string);

        self::assertInstanceOf(Map::class, $map);
        self::assertEquals(['f', 'o', 'o'], $map->toArray());
        self::assertEquals([0 => 'f', 1 => 'o', 2 => 'o'], $map->toArray());
    }

    public function testStaticFromArray(): void
    {
        $array = [1, 2, 3];
        $map = Map::from($array);

        self::assertInstanceOf(Map::class, $map);
        self::assertEquals($array, $map->toArray());
    }

    public function testStaticFromMap(): void
    {
        $array = ['foo', 'window'];
        $map = Map::from(new Map($array));
        $map_2 = Map::from($map);

        self::assertInstanceOf(Map::class, $map);
        self::assertInstanceOf(Map::class, $map_2);
        self::assertEquals($array, $map->toArray());
        self::assertSame($map, $map_2);

    }

    public function testStaticFromRange(): void
    {
        $range = 5;
        $map = Map::from($range);

        self::assertInstanceOf(Map::class, $map);
        self::assertEquals([0, 1, 2, 3, 4], $map->toArray());

    }

    public function testStaticFromCallback(): void
    {
        $array = [1, 2, 3];

        self::assertEquals(
            [2, 4, 6],
            Map::from($array, function($value) {
                return $value + $value;
            })->toArray());
    }

    public function testStaticFromMapNested(): void
    {
        $array = [['1', 'a'], ['2', 'b']];
        $map = Map::from(new Map($array));

        self::assertInstanceOf(Map::class, $map);
        self::assertEquals([['1', 'a'], ['2', 'b']], $map->toArray());
        self::assertEquals([['1', 'a'], ['2', 'b']], Map::from($map->values())->toArray());
        self::assertEquals([0, 1], Map::from($map->keys())->toArray());
    }

    public function testFailedStaticFrom(): void
    {
        $this->expectException(TypeError::class);
        $this->expectExceptionMessage('NULL is not iterable');

        Map::from();
    }


//    public function testFromJson()
//    {
//        $map = Map::fromJson( '["a", "b"]' );
//
//        $this->assertInstanceOf( Map::class, $map );
//        $this->assertEquals( ['a', 'b'], $map->toArray() );
//    }
//
//
//    public function testFromJsonObject()
//    {
//        $map = Map::fromJson( '{"a": "b"}' );
//
//        $this->assertInstanceOf( Map::class, $map );
//        $this->assertEquals( ['a' => 'b'], $map->toArray() );
//    }
//
//
//    public function testFromJsonEmpty()
//    {
//        $map = Map::fromJson( '""' );
//
//        $this->assertInstanceOf( Map::class, $map );
//        $this->assertEquals( [''], $map->toArray() );
//    }
//
//
//    public function testFromJsonException()
//    {
//        $this->expectException( '\RuntimeException' );
//        Map::fromJson( '' );
//    }

}
