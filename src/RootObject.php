<?php

namespace GraphQLExample;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;

class RootObject extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Query',
            'fields' => [
                'HelloWorld' => [
                    'type' => Type::string(),
                    'resolve' => function($value, $args, $context, ResolveInfo $info) {
                        return 'Hello World';
                    }
                ]
            ],
        ];

        parent::__construct($config);
    }
}
