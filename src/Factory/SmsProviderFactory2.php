<?php 
//NOTE : I prefer this factory because it will decouple the added providers fron this factory using php 
// because Whenever I add a new provider  I dont have to modify the factory 

namespace Sms\Factory;

use Sms\Enums\Provider;
use Sms\Exceptions\SmsProviderNotFoundException;
use Sms\contracts\SmsProvider;

class SmsProviderFactory2 
{
    public static function makeProvider(Provider $provider): SmsProvider
    {
        $classNmae = '\\Sms'.'\\providers\\'.ucfirst($provider) . 'Provider';

        return new $classNmae;
    } 
}