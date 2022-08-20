<?php 

namespace Sms\Commands;

use Sms\Contracts\Command;
use Sms\SmsHandler;
use UnexpectedValueException;
use Sms\Exceptions\SmsException;

class SendCommand implements Command 
{
    /**
     * @param array $args
     * @return void
     */
    public function execute(array $args)
    {
        try
        {
            $smsHandler = new SmsHandler($args[0]);
            $smsHandler->sendSms($args[1], $args[2]);
            echo 'Sent successfully!';

        } catch(SmsException $e) {
            echo $e->getMessage();
            return;
        } catch(UnexpectedValueException $e) {
            echo 'Not Provided SMS Provider';
            return;
        }

    }
}