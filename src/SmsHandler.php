<?php 

namespace Sms;

use GuzzleHttp\Exception\GuzzleException;
use Sms\Contracts\Configurable;
use Sms\Contracts\SmsProvider;
use Sms\Enums\Provider;
use Sms\Factory\SmsProviderFactory;
use Sms\Providers\SmsConfig;

class SmsHandler
{

    /**
     * @var SmsProvider
     */
    protected SmsProvider $provider;

    /**
     * @param string $provider
     */
    public function __construct(string $provider)
    {
        /** @var Configurable $provider */
        $provider =  SmsProviderFactory::make(Provider::from($provider));
        $config = new SmsConfig(include "config/sms.php");
        $this->provider = $provider->setConfig($config);
    }

    /**
     * @param string $mobileNumber
     * @param string $message
     * @return void
     * @throws GuzzleException
     */
    public function sendSms(string $mobileNumber, string $message)
    {
        $this->provider->send($mobileNumber, $message);
    }
}