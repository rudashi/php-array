<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Rudashi\Collection;
use Rudashi\Map;

class HelpersTest extends TestCase
{

    public function testMapFunctionExists(): void
    {
        self::assertInstanceOf( Map::class, map());
        self::assertInstanceOf( Map::class, map([]));
        self::assertInstanceOf( Map::class, map('apple'));
        self::assertInstanceOf( Map::class, map(new Map));
    }

    public function testCollectionFunctionExists(): void
    {
        self::assertInstanceOf( Collection::class, collect());
        self::assertInstanceOf( Collection::class, collect([]));
        self::assertInstanceOf( Collection::class, collect('apple'));
        self::assertInstanceOf( Collection::class, collect(new Collection));
    }

}
