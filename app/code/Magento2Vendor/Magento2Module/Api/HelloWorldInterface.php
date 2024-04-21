<?php

namespace Magento2Vendor\Magento2Module\Api;


interface HelloWorldInterface
{
    /**
     * GET for Current Url
     * @param string $param
     * @return string
     */

    public function getCurrentUrl();

    /**
     * GET for Hello World api
     * @param string $param
     * @return string
     */

    public function postHelloWorld();
}
