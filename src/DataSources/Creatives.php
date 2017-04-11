<?php

namespace GraphQLExample\DataSources;

class Creatives
{
    private $items = [
        1 => [
            'id' => 1,
            'fqid' => 'creative.1'
        ],
        2 => [
            'id' => 2,
            'fqid' => 'creative.2'
        ]
    ];

    public function findById($id, array $fieldsToSelect = ['*'])
    {
        if (array_key_exists($id, $this->items)) {
            return array_column_multi([$this->items[$id]], $fieldsToSelect);
        }

        throw new \InvalidArgumentException("Creative can't be found by ID {$id}");
    }

    public function findAll(array $fieldsToSelect = ['*'])
    {
        if (count($fieldsToSelect) === 1 && $fieldsToSelect[0] === '*') {
            return $this->items;
        }

        return array_column_multi($this->items, $fieldsToSelect);
    }
}
