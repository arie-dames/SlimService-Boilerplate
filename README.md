# SlimService-Boilerplate
This repository contains a more or less clean boilerplate for REST services using [Slim Framework](http://slimframework.com)

## System Requirements

* Web server with URL rewriting 
* PHP 5.5 or newer.

## How to Setup the Boilerplate
This project is using  [Composer](https://getcomposer.org), a Dependency Manager for PHP.

Please navigate into the project's root directory and execute the bash command shown below. This command downloads the Slim Framework and third-party dependencies into a newly created folder "vendor" in the project structure.

    composer install
    
The main entry point of the application (index.php) is located in the "rest" folder of the project. Here you will find a .htaccess file with the rewrite rules.

    RewriteEngine On
    RewriteBase /PathToYourService/rest
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^(.*)$ index.php [QSA,L]

Please adjust the RewriteBase accordingly (if setting RewriteBase is necessary for your web server). You can also think about moving the .htaccess and index.php to the root path if you don't like having it in the rest folder.

More information [can be found here](https://www.slimframework.com/docs/start/web-servers.html).

## How to Deploy the Boilerplate

Upload the folder to your web server to a dedicated subfolder, e.g.

https://YourDomain/services/boilerplate

## How to Use the Boilerplate

After setting up the boilerplate project and deploying it to your web server, you should be able to call the available example services:

    https://YourDomain/PathToYourService/rest/isalive

Returns a valid JSON result, otherwise something went wrong.

    https://YourDomain/PathToYourService/rest/example/cache/write/{TestString}
    
Will persist the given test string in the cache (for at least 5 minutes) (PUT).

    https://YourDomain/PathToYourService/rest/example/cache/read

Returns the cached value (or nothing, if cache is empty).

    https://YourDomain/PathToYourService/rest/example/widget
    
Renders the example.phtml template.


