# Maison Construction
[![build status](https://gitlab.groupe-pratique.com/GPratique/maison-construction/badges/master/build.svg)](https://gitlab.groupe-pratique.com/GPratique/maison-construction/commits/develop) 
[![coverage report](https://gitlab.groupe-pratique.com/GPratique/maison-construction/badges/master/coverage.svg)](https://gitlab.groupe-pratique.com/GPratique/maison-construction/commits/develop)

## Introduction

This is a Maison Construction application using the `Zend Framework 3 MVC` layer, with template
engine `Twig 2`, stylesheet preprocessing `sass` and module systems.

## Installation using Composer

The easiest way to create a new Zend Framework project is to use
[Composer](https://getcomposer.org/).  If you don't have it already installed,
then please install as per the [documentation](https://getcomposer.org/doc/00-intro.md).

To create your new Zend Framework project:

```bash
$ composer create-project -sdev ppito/zf3-skeleton-application path/to/install
```

Once installed, you can test it out immediately using PHP's built-in web server:

```bash
$ cd path/to/install
$ php -S 0.0.0.0:8080 -t public/ public/index.php
# OR use the composer alias:
$ composer serve
```

This will start the cli-server on port 8080, and bind it to all network
interfaces. You can then visit the site at http://localhost:8080/
- which will bring up Zend Framework welcome page.

**Note:** The built-in CLI server is *for development only*.

## Development mode

The skeleton ships with [zf-development-mode](https://github.com/zfcampus/zf-development-mode)
by default, and provides three aliases for consuming the script it ships with:

```bash
$ composer development-enable  # enable development mode
$ composer development-disable # disable development mode
$ composer development-status  # whether or not development mode is enabled
```

You may provide development-only modules and bootstrap-level configuration in
`config/development.config.php.dist`, and development-only application
configuration in `config/autoload/development.local.php.dist`. Enabling
development mode will copy these files to versions removing the `.dist` suffix,
while disabling development mode will remove those copies.

Development mode is automatically enabled as part of the skeleton installation process. 
After making changes to one of the above-mentioned `.dist` configuration files you will
either need to disable then enable development mode for the changes to take effect,
or manually make matching updates to the `.dist`-less copies of those files.

## Using docker-compose

This skeleton provides a `docker-compose.yml` for use with
[docker-compose](https://docs.docker.com/compose/); it
uses the `webdevops/php-apache` image container. Start the image using:

```bash
$ docker-compose up -d
```

At this point, you can visit http://localhost:8080 to see the site running.

You can also configure the root directory and the domaine name in `docker-compose.yml` file.

```bash
WEB_DOCUMENT_ROOT: /app/public
WEB_ALIAS_DOMAIN: zf3.local
```

## QA Tools

The skeleton does not come with any QA tooling by default, but does ship with
configuration for each of:

- [Phing](#)
- [pdepend](#)
- [phpcpd](#)
- [phpcs](https://github.com/squizlabs/php_codesniffer)
- [phpdox](#)
- [phploc](#)
- [phpmd](#)
- [phpunit](https://phpunit.de)

If you want to add these QA tools, execute the following:

```bash
$ composer update --dev
```

We provide aliases for each of these tools in the Composer configuration:

```bash
# Run CS checks:
$ composer cs-check
# Fix CS errors:
$ composer cs-fix
# Run PHPUnit tests:
$ composer test
```
