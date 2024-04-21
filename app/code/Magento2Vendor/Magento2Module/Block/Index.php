<?php

namespace Magento2Vendor\Magento2Module\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento2Vendor\Magento2Module\Helper\Data;

class Index extends \Magento\Framework\View\Element\Template
{
    protected $helperData;

    public function __construct(
        Data $helperData,
        Context $context,
        array $data = []
    ) {
        $this->helperData = $helperData;
        parent::__construct($context, $data);
    }

    public function getEnableConfig()
    {
        return $this->helperData->getGeneralConfig('enable');
    }

    public function getDisplayTextConfig()
    {
        return $this->helperData->getGeneralConfig('enable') ? $this->helperData->getGeneralConfig('display_text') : '';
    }
}
