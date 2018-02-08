<?php

/**
 * Boilerplate for REST service using Slim Framework
 *
 * @link      https://github.com/arie-dames/SlimService-Boilerplate
 * @copyright Copyright (c) 2018 Arie Dames
 * @license   https://github.com/arie-dames/SlimService-Boilerplate/blob/master/LICENSE (MIT License)
 */

return [
		'httpVersion' => '1.1', // The protocol version used by the Response object
		'responseChunkSize' => 4096, // Size of each chunk read from the Response body when sending to the browser
		'outputBuffering' => 'append', // false, append, prepend
		'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => true, // Allow the web server to send the content-length header
        'routerCacheFile' => false,

        // renderer settings
        'renderer' => [
            'template_path' => '../templates/',
        ]
];

?>