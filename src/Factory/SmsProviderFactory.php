<?php

namespace Sms\Factory;

use GuzzleHttp\Client;
use Sms\Contracts\ProviderFactory;
use Sms\Contracts\SmsProvider;
use Sms\Enums\Provider;
use Sms\Exceptions\SmsException;

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

        return new $className(new Client());
    } 
}