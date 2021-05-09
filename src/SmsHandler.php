<?php 

namespace Sms;

use Sms\Enums\Provider;
use Sms\Factory\SmsProviderFactory2;

class SmsHandler
{

    protected $provider;

    public function __construct(string $provider)
    {        
        $this->provider =  SmsProviderFactory2::makeProvider(Provider::from($provider)); 
    }

    public function sendSms(string $mobileNumber, string $message)
    {
        
        $this->provider->send($mobileNumber, $message);    

    }
}