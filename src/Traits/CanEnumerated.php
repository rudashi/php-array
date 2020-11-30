<?php

namespace Rudashi\Traits;

trait CanEnumerated
{

    public function push(...$elements): self
    {
        foreach ($elements as $element) {
            $this->items[] = $element;
        }

        return $this;
    }

}