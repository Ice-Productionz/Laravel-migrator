<?php

namespace IceProductionz\LaravelMigrator\Migration;

class Collection
{
    /**
     * @var Migration[]
     */
    private $list;

    /**
     * Collection constructor.
     *
     * @param Migration ...$list
     */
    public function __construct(Migration ...$list)
    {
        $this->list = $list;
    }

    /**
     * @return Migration[]
     */
    public function all(): array
    {
        return $this->list;
    }
}
