<?php

require_once "./vendor/autoload.php";

use GraphQL\GraphQL;
use GraphQL\Schema;
use GraphQL\Error\FormattedError;

use GraphQLExample\RootObject;

try {

    // Parse incoming query and variables
    $raw = file_get_contents('php://input') ?: '';
    $data = json_decode($raw, true);
    if (!$data) {
        $data = [];
    }
    
    $data += ['query' => null, 'variables' => null];

    if (null === $data['query']) {
        $data['query'] = '{HelloWorld}';
    }

    // GraphQL schema to be passed to query executor:
    $schema = new Schema([
        'query' => new RootObject
    ]);

    $result = GraphQL::execute(
        $schema,
        $data['query'],
        null,
        null,
        (array) $data['variables']
    );

    $httpStatus = 200;
} catch (\Exception $error) {
    $httpStatus = 500;
    $result['extensions']['exception'] = FormattedError::createFromException($error);
}

header('Content-Type: application/json', true, $httpStatus);
echo json_encode($result);