<?php

/**
 * Boilerplate for REST service using Slim Framework
 *
 * @link      https://github.com/arie-dames/SlimService-Boilerplate
 * @copyright Copyright (c) 2018 Arie Dames
 * @license   https://github.com/arie-dames/SlimService-Boilerplate/blob/master/LICENSE (MIT License)
 */

function readFromFileCache($identifier, $maxAgeInSeconds) {
	$cachedResponse = null;
	$cacheFile = '../cache' . DIRECTORY_SEPARATOR . md5($identifier);
    if (file_exists($cacheFile)) {
        $fh = fopen($cacheFile, 'r');
        $cacheTime = trim(fgets($fh));
        // if data was cached recently, return cached data
        if ($cacheTime > (time() - $maxAgeInSeconds)) {
            $cachedResponse = unserialize(fgets($fh));
	        fclose($fh);
        }
        else {
        	// else delete cache file
        	fclose($fh);
        	unlink($cacheFile);
        }
    }
    return $cachedResponse;
}

function readFromFileCacheWithoutMaxAge($identifier) {
	$cachedResponse = null;
	$cacheFile = '../cache' . DIRECTORY_SEPARATOR . md5($identifier);
    if (file_exists($cacheFile)) {
        $fh = fopen($cacheFile, 'r');
        $cacheTime = trim(fgets($fh));
        $cachedResponse = unserialize(fgets($fh));
	    fclose($fh);
    }
    return $cachedResponse;
}

function writeToFileCache($identifier, $response) {
	$cacheFile = '../cache' . DIRECTORY_SEPARATOR . md5($identifier);
    $fh = fopen($cacheFile, 'w');
    fwrite($fh, time() . "\n");
    fwrite($fh, serialize($response));
    fclose($fh);
}

?>