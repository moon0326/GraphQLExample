<?php

namespace GraphQLExample\Objects;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQLExample\DataSources\Products;

class CreativeObject extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Creative',
            'fields' => [
                'id' => Type::id(),
                'fqid' => Type::string(),
                'products' => [
                    'type' => Type::listOf(new ProductObject()),
                    'args' => [
                        'name' => Type::listOf(Type::string())
                    ],
                    'resolve' => [$this, 'findProduct']
                ]
            ]
        ];

        parent::__construct($config);
    }

    public function findProduct($value, $args, $context, ResolveInfo $info)
    {
        $fieldsToSelect = array_keys($info->getFieldSelection());
        $data = new Products();

        if ($args) {
            return $data->findByNames($args['name'], $fieldsToSelect);
        }

        return $data->findAll($fieldsToSelect);
    }
}
