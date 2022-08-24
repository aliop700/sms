<?php 

namespace Sms;

use Sms\Enums\Provider;
use Sms\Factory\SmsProviderFactory;

class SmsHandler
{

    /**
     * @var Contracts\SmsProvider
     */
    protected $provider;

    /**
     * @param string $provider
     */
    public function __construct(string $provider)
    {
        $this->provider =  SmsProviderFactory::make(Provider::from($provider));
    }

    /**
     * @param string $mobileNumber
     * @param string $message
     * @return void
     */
    public function sendSms(string $mobileNumber, string $message)
    {
        $this->provider->send($mobileNumber, $message);
    }
}