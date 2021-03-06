# CodeIgniter 4 Application Starter

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds a composer-installable app starter.
It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).

## Installation & updates

`composer create-project codeigniter4/appstarter` then `composer update` whenever
there is a new release of the framework.

When updating, check the release notes to see if there are any changes you might need to apply
to your `app` folder. The affected files can be copied or merged from
`vendor/codeigniter4/framework/app`.

## Setup

Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use Github issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)

## Project Used Commands

reference [https://www.twilio.com/blog/create-secured-restful-api-codeigniter-php](https://www.twilio.com/blog/create-secured-restful-api-codeigniter-php)

- Load Server `php spark serve`
- Create migration `php spark migrate:create`
- Execute migrations `php spark migrate`
- Add Seeder `php spark make:seeder` ClientSeeder
- Add fake data using Seeder class `php spark db:seed ClientSeeder`
- Add Filter `php spark make:filter` JWTAuthenticationFilter
- Add Controller `php spark make:controller` Auth
- Add Validator `php spark make:validation`
- Verify Routes `php spark routes`

## JWT

reference: [firebase/php-jwt](https://github.com/firebase/php-jwt)

- Install with composer `composer require firebase/php-jwt`

## Swagger Steps in Codeigniter

### Swagger UI

Download Files from [https://github.com/swagger-api/swagger-ui/tree/master/dist](https://github.com/swagger-api/swagger-ui/tree/master/dist)

- Add html content over app/Views/
- Add all css and js files over public/
- Change urls to use <?= base_url('assets/swagger-ui.css') ?>
- Specify the url of the json

### Swagger PHP

Reference [https://github.com/zircote/swagger-php](https://github.com/zircote/swagger-php)

Install swagger-php with composer `composer require zircote/swagger-php`

- Create a php file over public/
- Add call and use OpenApi\Serializer

```php
<?php

require("../../vendor/autoload.php");

$openapi = \OpenApi\Generator::scan(['../../app/Controllers/']);

header('Content-Type: application/json');
echo $openapi->toJSON();

```

- Finally use Add annotations to your php files over app/Controllers
