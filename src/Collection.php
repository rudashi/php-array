<?php

namespace Rudashi;

use Rudashi\Traits\CanEnumerated;
use Rudashi\Contracts\CollectionInterface;

class Collection extends EnumeratedValues implements CollectionInterface
{

    use CanEnumerated;

}