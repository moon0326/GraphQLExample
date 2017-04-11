<?php

namespace GraphQLExample\DataSources;

class Products
{
    private $items = [
        'print' => [
            'id' => 1,
            'name' => 'print'
        ],
        'mug' => [
            'id' => 2,
            'name' => 'mug'
        ]
    ];

    public function findByNames(array $names, array $fieldsToSelect = ['*'])
    {
        $selected = [];
        foreach ($names as $name) {
            if (array_key_exists($name, $this->items)) {
                $selected[] = $this->items[$name];
            }
        }

        if (count($selected) === 0) {
            throw new \InvalidArgumentException("Found 0 product by ".implode(",",$names));
        }

        return array_column_multi($selected, $fieldsToSelect);
    }

    public function findAll(array $fieldsToSelect = ['*'])
    {
        if (count($fieldsToSelect) === 1 && $fieldsToSelect[0] === '*') {
            return $this->items;
        }

        return array_column_multi($this->items, $fieldsToSelect);
    }
}
