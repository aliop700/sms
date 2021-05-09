<?php

namespace Sms\providers;

use Sms\contracts\SmsProvider;
use Sms\Exceptions\SmsException;

class D7SMSProvider implements SmsProvider
{
    protected $client;

    public function __construct()
    {
        $this->client =  new \GuzzleHttp\Client();
    }

    public function authenticationHeader()
    {
        return [
            'Authorization' =>  'Basic Zm9vOmJhcg=='
        ];
    }

    public function send(string $mobile, string $message)
    {
        $data = [
            'to'        =>  $mobile,
            'from'      =>  'D7sms',
            'content'   =>  $message,
            'dlr'       =>  'yes',
            'dlr-url'   =>  'http://192.168.202.54/dlr_receiver.php',
            'dlr-level' =>  3
        ];

        $res = $this->client->request('POST','https://rest-api.d7networks.com/secure/send',[
            'headers'   =>  $this->authenticationHeader(),
            'http_errors' => false,
            'json'  =>  $data
        ]);

        if($res->getStatusCode() == 403)
            throw SmsException::fromFailedAuthentication();
    }
}