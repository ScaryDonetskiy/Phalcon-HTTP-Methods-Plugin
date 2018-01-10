<?php

namespace Vados\PhalconPlugins\Tests;

use Phalcon\Di\FactoryDefault;
use Vados\PhalconPlugins\HTTPMethodsPlugin;
use Vados\PhalconPlugins\Tests\mocks\Requests;
use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;
use PHPUnit\Framework\TestCase;

/**
 * Class HTTPMethodsPluginTest
 * @package Vados\PhalconPlugins\Tests
 */
class HTTPMethodsPluginTest extends TestCase
{
    /**
     * @var HTTPMethodsPlugin
     */
    private $instance;

    /**
     * @var Event
     */
    private $event;

    /**
     * @var Dispatcher
     */
    private $dispatcher;

    /**
     * @var Requests
     */
    private $request;

    public function setUp()
    {
        $this->instance = new HTTPMethodsPlugin();
        $this->event = new Event('dispatch:beforeExecuteRoute', $this);
        $this->dispatcher = new Dispatcher();
        $this->dispatcher->setDI(new FactoryDefault());
        $this->dispatcher->setDefaultNamespace('Vados\PhalconPlugins\Tests\mocks');
        $this->dispatcher->setControllerName('Test');
        $this->dispatcher->getDI()->set('request', new Requests());
        $this->request = $this->dispatcher->getDI()->get('request');
    }

    /**
     * @throws \Exception
     */
    public function testWithoutMethod()
    {
        $this->assertTrue($this->instance->beforeExecuteRoute($this->event, $this->dispatcher));
    }

    /**
     * @throws \Exception
     */
    public function testOnlyGetMethod()
    {
        $this->assertTrue($this->instance->beforeExecuteRoute($this->event, $this->dispatcher));
    }

    /**
     * @throws \Exception
     */
    public function testOnlyPostMethod()
    {
        $this->dispatcher->setActionName('onlyPost');
        $this->assertFalse($this->instance->beforeExecuteRoute($this->event, $this->dispatcher));
        $this->request->setPost();
        $this->assertTrue($this->instance->beforeExecuteRoute($this->event, $this->dispatcher));
    }

    /**
     * @throws \Exception
     */
    public function testOnlyPutMethod()
    {
        $this->dispatcher->setActionName('onlyPut');
        $this->assertFalse($this->instance->beforeExecuteRoute($this->event, $this->dispatcher));
        $this->request->setPut();
        $this->assertTrue($this->instance->beforeExecuteRoute($this->event, $this->dispatcher));
    }

    /**
     * @throws \Exception
     */
    public function testOnlyDeleteMethod()
    {
        $this->dispatcher->setActionName('onlyDelete');
        $this->assertFalse($this->instance->beforeExecuteRoute($this->event, $this->dispatcher));
        $this->request->setDelete();
        $this->assertTrue($this->instance->beforeExecuteRoute($this->event, $this->dispatcher));
    }

    /**
     * @throws \Exception
     */
    public function testFewMethods()
    {
        $this->dispatcher->setActionName('fewMethods');
        $this->assertTrue($this->instance->beforeExecuteRoute($this->event, $this->dispatcher));
        $this->request->setPost();
        $this->assertTrue($this->instance->beforeExecuteRoute($this->event, $this->dispatcher));
        $this->request->setPut();
        $this->assertFalse($this->instance->beforeExecuteRoute($this->event, $this->dispatcher));
        $this->request->setDelete();
        $this->assertFalse($this->instance->beforeExecuteRoute($this->event, $this->dispatcher));
    }
}