<?php

namespace Vados\PhalconPlugins;

use Phalcon\Annotations\AdapterInterface;
use Phalcon\Events\Event;
use Phalcon\Http\RequestInterface;
use Phalcon\Mvc\Dispatcher;

/**
 * Class HTTPMethodsPlugin
 * @package Vados\PhalconPlugins
 */
class HTTPMethodsPlugin
{
    /**
     * @param Event $event
     * @param Dispatcher $dispatcher
     * @return bool
     */
    public function beforeExecuteRoute(/** @scrutinizer ignore-unused */ Event $event, Dispatcher $dispatcher): bool
    {
        /** @var AdapterInterface $annotationsAdapter */
        $annotationsAdapter = $dispatcher->getDI()->get('annotations');
        $methodAnnotations = $annotationsAdapter->getMethod($dispatcher->getControllerClass(),
            $dispatcher->getActionName() . 'Action');
        if ($methodAnnotations->has('Method')) {
            $args = $methodAnnotations->get('Method')->getArguments();
            /** @var RequestInterface $request */
            $request = $dispatcher->getDI()->get('request');
            if ($request->isGet()) {
                return in_array('GET', $args);
            }
            if ($request->isPost()) {
                return in_array('POST', $args);
            }
            if ($request->isPut()) {
                return in_array('PUT', $args);
            }
            if ($request->isDelete()) {
                return in_array('DELETE', $args);
            }
        }

        return true;
    }
}