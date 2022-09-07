<?php

namespace Sms\Contracts;

use Sms\Enums\Provider;

interface ProviderFactory
{
    /**
     * @param Provider|string $provider
     * @return SmsProvider
     */
    public static function make($provider): SmsProvider;
}