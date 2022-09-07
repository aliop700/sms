<?php

namespace Sms\Providers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Sms\Contracts\Configurable;
use Sms\Contracts\SmsProvider;
use Sms\Exceptions\SmsException;
use Sms\Exceptions\UnauthenticatedException;

class D7SMSProvider implements SmsProvider, Configurable
{
    /**
     * @var Client
     */
    protected Client $client;

    /**
     * @var SmsConfig
     */
    protected SmsConfig $config;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client =  $client;
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

        $response = $this->client->request('POST', $this->config->endpoint_url,[
            'headers'     =>  $this->authenticationHeader(),
            'http_errors' => false,
            'json'        =>  $data
        ]);

        if($response->getStatusCode() == 403) {
            throw new UnauthenticatedException("unauthenticated", 403);
        }

        if ($response->getStatusCode() > 299 || $response->getStatusCode() < 200) {
            throw new SmsException("Something went wrong", $response->getStatusCode());
        }
    }

    /**
     * @param SmsConfig $config
     * @return $this
     */
    public function setConfig(SmsConfig $config): self
    {
        $this->config = $config;
        return $this;
    }

    /**
     * @return array
     */
    private function authenticationHeader(): array
    {
        return [
            'Authorization' =>  $this->config->auth_token
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
            'from'      =>  $this->config->sender,
            'content'   =>  $data['content'],
            'dlr'       =>  $this->config->dlr,
            'dlr-url'   =>  $this->config->dlr_url,
            'dlr-level' =>  $this->config->dlr_level
        ];
    }
}