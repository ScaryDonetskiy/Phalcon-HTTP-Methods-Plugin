# HTTP Methods Plugin for Phalcon PHP #

![Packagist](https://img.shields.io/packagist/l/vados/phalcon-http-methods-plugin.svg)
![PHP from Packagist](https://img.shields.io/packagist/php-v/vados/phalcon-http-methods-plugin.svg)
![Packagist](https://img.shields.io/packagist/dt/vados/phalcon-http-methods-plugin.svg)
![GitHub Issues](https://img.shields.io/github/issues-raw/ScaryDonetskiy/Phalcon-HTTP-Methods-Plugin.svg)

Phalcon plugin for checking access by HTTP Method of request. 

You can select one or more HTTP methods for action availability from this: GET, POST, PUT, DELETE.

Works with PHP 7.1+

### Usage ###

Plugin require availability 'Annotations' and 'Request' components in application DI container.
```php
$dispatcher = new \Phalcon\Mvc\Dispatcher();
$eventManager = new \Phalcon\Events\Manager();
$eventManager->attach('dispatch:beforeExecuteRoute', new \Vados\PhalconPlugins\HTTPMethodsPlugin());
$dispatcher->setEventsManager($eventManager);
```

And just take annotations to controllers actions
```php
class FooController extends \Phalcon\Mvc\Controller
{
    /**
     * @Method(GET, POST, PUT, DELETE)
     */
    public function barAction()
    {
        return 'foobar';
    }
}
``` 

### Installation ###

Use composer for installation
```bash
composer require vados/phalcon-http-methods-plugin
```

### Contribution guidelines ###

* Writing tests
* Code review
* Guidelines accord