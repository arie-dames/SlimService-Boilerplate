<?php

/**
 * Boilerplate for REST service using Slim Framework
 *
 * @link      https://github.com/arie-dames/SlimService-Boilerplate
 * @copyright Copyright (c) 2018 Arie Dames
 * @license   https://github.com/arie-dames/SlimService-Boilerplate/blob/master/LICENSE (MIT License)
 */

require '../src/filecache.php';
	
$app->get('/isalive', function ($request, $response) {
	return $response->withJson(array('result' => array('isalive' => true)));
});

$app->put('/example/cache/write/{value}', function ($request, $response) {
	$value = urlencode($request->getAttribute('value'));
	if (is_null($value)) {
		return $response->withStatus(400);
	}
	writeToFileCache("/example/cache", $value);
});

$app->get('/example/cache/read', function ($request, $response) {
	$timeToCache = 300; // 5 minutes
	$cachedValue = readFromFileCache("/example/cache", $timeToCache);
	$response->write($cachedValue);
});

$app->get('/example/widget', function ($request, $response) {
	$timeToCache = 300; // 5 minutes
	$cachedValue = readFromFileCache("/example/cache", $timeToCache);
    return $this->renderer->render($response, "example.phtml", ["example" => ["value" => $cachedValue]]);
});

?>