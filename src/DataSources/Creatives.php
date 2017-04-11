<?php

namespace GraphQLExample\DataSources;

class Creatives
{
    private $items = [
        1 => [
            'id' => 1,
        ],
        2 => [
            'id' => 2
        ]
    ];

    public function findById($id)
    {
        if (array_key_exists($id, $this->items)) {
            return $this->items[$id];
        }

        throw new \InvalidArgumentException("Creative can't be found by ID {$id}");
    }

    public function findAll()
    {
        return $this->items;
    }
}
