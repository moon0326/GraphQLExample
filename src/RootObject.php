<?php

namespace GraphQLExample;

use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use GraphQLExample\Objects\CreativeObject;

class RootObject extends ObjectType
{
    public function __construct()
    {
        $config = [
            'name' => 'Query',
            'fields' => [
                'Creative' => [
                    'type' => Type::listOf(new CreativeObject()),
                    'resolve' => [$this, 'findCreative']
                ],
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

    public function findCreative($value, $args, $context, ResolveInfo $info)
    {
        return [];
    }
}
