<?php 

namespace Sms\commands;

use Sms\contracts\Command;
use Sms\SmsHandler;

class SendCommand implements Command 
{
    public function execute(array $args)
    {
        try
        {
            $smsHandler = new SmsHandler($args[0]);
            $smsHandler->sendSms($args[1], $args[2]);
            echo 'Sent Succesfully';

        } catch(\Sms\Exceptions\SmsException $e) {
            echo $e->getMessage();
            return;
        } catch(\UnexpectedValueException $e) {
            echo 'Not Provided Sms Provider';
            return;
        }

    }
}