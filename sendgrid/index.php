<?php
// Uncomment next line if you're not using a dependency loader (such as Composer)
require_once 'sendgrid-php.php';

$apiKey = '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';
$sg = new \SendGrid($apiKey);
$request_body = json_decode('{
    "contacts": [
        {
            "email": "demqweo@gmail.com",
            "first_name": "Test",
            "last_name": "demo"
        }
    ]
}');

try {
    $response = $sg->client->marketing()->contacts()->put($request_body);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $ex) {
    echo 'Caught exception: '.  $ex->getMessage();
}