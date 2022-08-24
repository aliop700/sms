<?php

namespace Sms\Factory\Contracts;

use Sms\Contracts\SmsProvider;
use Sms\Enums\Provider;

interface ProviderFactory
{
    /**
     * @param Provider|string $provider
     * @return SmsProvider
     */
    public static function make($provider): SmsProvider;
}