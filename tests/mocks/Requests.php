<?php

namespace Vados\PhalconPlugins\Tests\mocks;

/**
 * Class Requests
 * @package Vados\PhalconPlugins\Tests\mocks
 */
class Requests
{
    /**
     * @var string
     */
    private $currentMethod = 'GET';

    /**
     * @return bool
     */
    public function isGet(): bool
    {
        return $this->currentMethod === 'GET';
    }

    /**
     * @return bool
     */
    public function isPost(): bool
    {
        return $this->currentMethod === 'POST';
    }

    /**
     * @return bool
     */
    public function isPut(): bool
    {
        return $this->currentMethod === 'PUT';
    }

    /**
     * @return bool
     */
    public function isDelete(): bool
    {
        return $this->currentMethod === 'DELETE';
    }

    public function setGet()
    {
        $this->currentMethod = 'GET';
    }

    public function setPost()
    {
        $this->currentMethod = 'POST';
    }

    public function setPut()
    {
        $this->currentMethod = 'PUT';
    }

    public function setDelete()
    {
        $this->currentMethod = 'DELETE';
    }

    /**
     * @param null $var
     * @return mixed
     */
    public function getPost($var = null)
    {
        if ($var === null) {
            return $_POST;
        }
        return $_POST[$var];
    }
}