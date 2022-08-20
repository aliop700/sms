<?php

namespace Sms\Factory;

use Sms\Enums\Provider;
use Sms\Contracts\SmsProvider;

class SmsProviderFactory2
{
    public static function makeProvider(Provider $provider): SmsProvider
    {
        $className = '\\Sms'.'\\Providers\\'.ucfirst($provider) . 'Provider';

        return new $className;
    } 
}