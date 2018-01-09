<?php

namespace Vados\PhalconPlugins\Tests\mocks;

use Phalcon\Mvc\Controller;

/**
 * Class TestController
 * @package Vados\PhalconPlugins\Tests\mocks
 */
class TestController extends Controller
{
    public function indexAction()
    {

    }

    /**
     * @Method(GET)
     */
    public function onlyGetAction()
    {

    }

    /**
     * @Method(POST)
     */
    public function onlyPostAction()
    {

    }

    /**
     * @Method(PUT)
     */
    public function onlyPutAction()
    {

    }

    /**
     * @Method(DELETE)
     */
    public function onlyDeleteAction()
    {

    }

    /**
     * @Method(GET, POST)
     */
    public function fewMethodsAction()
    {

    }
}