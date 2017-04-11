<?php

namespace GraphQLExample\Objects;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

class CreativeObject extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Creative',
            'fields' => [
                'id' => Type::id()
            ]
        ];

        parent::__construct($config);
    }
}
