<?php

namespace Sms\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Sms\Constants\SMS;
use Sms\Contracts\SmsProvider;
use Sms\Exceptions\SmsException;
use Sms\Exceptions\UnauthenticatedException;
use Sms\Support\Env;

class D7SMSProvider implements SmsProvider
{
    protected $client;

    public function __construct()
    {
        $this->client =  new Client();
    }


    /**
     * @param string $number
     * @param string $message
     * @return void
     * @throws GuzzleException
     * @throws SmsException
     */
    public function send(string $number, string $message)
    {
        $data = $this->data(['to' => $number, 'content' => $message]);

        $response = $this->client->request('POST', Env::get(SMS::ENDPOINT),[
            'headers'     =>  $this->authenticationHeader(),
            'http_errors' => false,
            'json'        =>  $data
        ]);

        if($response->getStatusCode() == 403) {
            throw new UnauthenticatedException("unauthenticated", 403);
        }
    }

    /**
     * @return array
     */
    private function authenticationHeader(): array
    {
        return [
            'Authorization' =>  Env::get(SMS::TOKEN)
        ];
    }

    /**
     * @param array $data
     * @return array
     */
    protected function data(array $data = []): array
    {
        return [
            'to'        =>  $data['to'],
            'from'      =>  Env::get(SMS::SENDER),
            'content'   =>  $data['content'],
            'dlr'       =>  Env::get(SMS::WITH_DLR),
            'dlr-url'   =>  Env::get(SMS::DLR_URL),
            'dlr-level' =>  Env::get(SMS::DLR_LEVEL)
        ];
    }
}