<?php 

namespace Sms\Factory;

use Sms\Enums\Provider;
use Sms\Exceptions\SmsProviderNotFoundException;
use Sms\contracts\SmsProvider;

class SmsProviderFactory 
{
    public static function makeProvider(string $provider): SmsProvider
    {
        $smsProvider = null;

        switch($provider) {
            case 'D7SMS':
                $smsProvider = new \Sms\providers\D7SMSProvider;
                break;
            default:
                throw new SmsProviderNotSupportedException;
        }

        return $smsProvider;
    } 
}