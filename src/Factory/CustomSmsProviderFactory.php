<?php 

namespace Sms\Factory;

use GuzzleHttp\Client;
use Sms\Contracts\ProviderFactory;
use Sms\Contracts\SmsProvider;
use Sms\Exceptions\SmsProviderNotSupportedException;
use Sms\Providers\D7SMSProvider;

class CustomSmsProviderFactory implements ProviderFactory
{
    protected const SUPPORTED_PROVIDERS = [
        'D7SMS' => D7SMSProvider::class
    ];

    /**
     * @param $provider
     * @return SmsProvider
     */
    public static function make($provider): SmsProvider
    {
        if (!isset(self::SUPPORTED_PROVIDERS[$provider])) {
            throw new SmsProviderNotSupportedException("SMS provider $provider is not supported", 400);
        }

        $class = self::SUPPORTED_PROVIDERS[$provider];
        return new $class(new Client());
    } 
}