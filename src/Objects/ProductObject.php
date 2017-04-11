<?php

namespace GraphQLExample\Objects;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class ProductObject extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Product',
            'fields' => [
                'id' => Type::id(),
                'name' => Type::string()
            ]
        ];

        parent::__construct($config);
    }
}
