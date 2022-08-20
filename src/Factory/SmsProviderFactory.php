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
        if (!isset(SMS::SUPPORTED_PROVIDERS[$provider])) {
            throw new SmsProviderNotSupportedException("SMS provider $provider is not supported", 400);
        }

        return new SMS::SUPPORTED_PROVIDERS[$provider];
    } 
}