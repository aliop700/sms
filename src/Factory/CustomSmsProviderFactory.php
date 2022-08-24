<?php 

namespace Sms\Factory;

use Sms\Contracts\SmsProvider;
use Sms\Exceptions\SmsProviderNotSupportedException;
use Sms\Factory\Contracts\ProviderFactory;
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

        return new self::SUPPORTED_PROVIDERS[$provider];
    } 
}