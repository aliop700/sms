<?php 

namespace Sms\Exceptions;

class SmsException extends \Exception
{
   public static function fromFailedAuthentication()
   {
       return new static('Authentication Failed');
   } 
}