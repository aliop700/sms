<?php

namespace Sms\Factory;

use Sms\Enums\Provider;
use Sms\Contracts\SmsProvider;
use Sms\Exceptions\SmsException;
use Sms\Factory\Contracts\ProviderFactory;

class SmsProviderFactory implements ProviderFactory
{
    /**
     * @param $provider
     * @return SmsProvider
     */
    public static function make($provider): SmsProvider
    {
        if (!$provider instanceof Provider) {
            throw new SmsException("Provider $provider must be an instance of ". Provider::class);
        }

        $className = '\\Sms'.'\\Providers\\'.ucfirst($provider) . 'Provider';

        return new $className;
    } 
}