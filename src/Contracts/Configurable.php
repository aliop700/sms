<?php

namespace Sms\Contracts;

use Sms\Providers\SmsConfig;

interface Configurable
{
    /**
     * @param SmsConfig $config
     * @return self
     */
    public function setConfig(SmsConfig $config): self;
}