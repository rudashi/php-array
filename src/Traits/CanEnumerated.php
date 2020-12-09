<?php

namespace Rudashi\Traits;

trait CanEnumerated
{

    /**
     * Push one or more items onto the end of the collection.
     *
     * @param  mixed  ...$elements
     * @return $this
     */
    public function push(...$elements): self
    {
        foreach ($elements as $element) {
            $this->items[] = $element;
        }

        return $this;
    }

}