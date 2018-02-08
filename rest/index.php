<?php

/**
 * Boilerplate for REST service using Slim Framework
 *
 * @link      https://github.com/arie-dames/SlimService-Boilerplate
 * @copyright Copyright (c) 2018 Arie Dames
 * @license   https://github.com/arie-dames/SlimService-Boilerplate/blob/master/LICENSE (MIT License)
 */


/**
 * Step 1: Require the Slim Framework using Composer's autoloader
 *
 * If you are not using Composer, you need to load Slim Framework with your own
 * PSR-4 autoloader.
 */
require '../vendor/autoload.php';

/**
 * Step 2: Instantiate a Slim application
 */
session_start();

// Register service provider with the container
$container = new \Slim\Container;
$container['cache'] = function () {
    return new \Slim\HttpCache\CacheProvider();
};

$container['settings'] = require '../src/settings.php';

// Add middleware to the application
$app = new \Slim\App($container);
$app->add(new \Slim\HttpCache\Cache('public', 86400));

// Set up dependencies
require '../src/dependencies.php';

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods.
 */
require '../src/routes.php';

/**
 * Step 4: Run the Slim application
 *
 * This method should be called last. This executes the Slim application
 * and returns the HTTP response to the HTTP client.
 */
$app->run();

?>