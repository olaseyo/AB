# A&D Booking Console

This is a simple transportation booking web app built on top a light MVC framework.

## Installation

[PHP](https://php.net) 5.5+ and [Composer](https://getcomposer.org) are required.


``` bash
Clone Repo,extract it inside phpmyadmin htdoc folder
```

``` bash
$ composer install
```

``` bash
  Create a database called ticketing
```

``` bash
  Import database file. File can be located in the root directory
```

``` php
  Update the configuration file config.php in the Config directory accordingly

define('DB_HOST','localhost');
define('DB_USER','olumide');
define('DB_PASSWORD','root');
define('DATABASE','ticketing');
define('SERVER','http://localhost:8888');
```

## Usage
Access project from you localhost menu or follow this pattern:
host:port/folder_name

## Testing


``` php
Update the functional.suite.yml file in the testing directory with your project url

actor: FunctionalTester
modules:
    enabled:
        # add a framework module here
        - PhpBrowser:
            url: http://localhost:8888/Ticketing
        - \Helper\Functional
    step_decorators: ~   
```
##Entity Relationship Diagram
![alt text](https://github.com/olaseyo/AB/blob/main/ticketing.png?raw=true)

# Database Constraints

https://docs.google.com/document/d/1frstXawzeFAscguxtmIYTX-EX6xhiiQ_sMyi8dC9q3s/edit?usp=sharing

## Supported database

Currently, only MYSQL is supported.
