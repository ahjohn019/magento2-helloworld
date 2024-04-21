<?php

namespace Magento2Vendor\Magento2Module\Model\Api;

use Psr\Log\LoggerInterface;
use Magento\Framework\UrlInterface;
use Magento2Vendor\Magento2Module\Helper\Data;
use Magento2Vendor\Magento2Module\Api\HelloWorldInterface;

class HelloWorldModel implements HelloWorldInterface
{
    protected $urlBuilder;
    protected $helperData;
    protected $logger;

    public function __construct(
        UrlInterface $urlBuilder,
        Data $helperData,
        LoggerInterface $logger
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->helperData = $helperData;
        $this->logger = $logger;
    }

    /**
     * Retrieve the current URL.
     * @return string
     */

    public function getCurrentUrl()
    {
        return $this->urlBuilder->getCurrentUrl();
    }

    /**
     * @inheritdoc
     */

    public function postHelloWorld()
    {
        $response = ['success' => false];

        try {
            $helloWorldOptions = (int)$this->helperData->getGeneralConfig('enable') !== 0 ? true : false;
            $helloWorldDisplayText = $this->helperData->getGeneralConfig('display_text');

            $response = ['success' => true, 'message' => [
                'options' =>
                $helloWorldOptions,
                'display_text' => $helloWorldOptions ? $helloWorldDisplayText : '',
                'current_url' => $this->getCurrentUrl(),
            ]];
        } catch (\Exception $e) {
            $response = ['success' => false, 'message' => $e->getMessage()];
            $this->logger->info($e->getMessage());
        }
        $returnArray = json_encode($response);
        return $returnArray;
    }
}
