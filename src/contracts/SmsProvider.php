<?php 

namespace Sms\contracts;

interface SmsProvider 
{
    public function send(string $number, string $message);
}