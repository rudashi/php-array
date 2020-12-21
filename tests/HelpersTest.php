<?php

namespace Tests;

use Rudashi\Collection;
use Rudashi\Map;
use PHPUnit\Framework\TestCase;

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
