<?php

/**
 * Boilerplate for REST service using Slim Framework
 *
 * @link      https://github.com/arie-dames/SlimService-Boilerplate
 * @copyright Copyright (c) 2018 Arie Dames
 * @license   https://github.com/arie-dames/SlimService-Boilerplate/blob/master/LICENSE (MIT License)
 */

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

?>