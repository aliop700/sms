<?php 

namespace Sms\Factory;

use Sms\Constants\SMS;
use Sms\Contracts\SmsProvider;
use Sms\Exceptions\SmsProviderNotSupportedException;
use Sms\Providers\D7SMSProvider;

class SmsProviderFactory 
{
    public static function makeProvider(string $provider): SmsProvider
    {
        if (!in_array($provider, SMS::SUPPORTED_PROVIDERS)) {
            throw new SmsProviderNotSupportedException("SMS provider $provider is not supported", 400);
        }

        return new D7SMSProvider();
    } 
}