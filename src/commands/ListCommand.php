<?php 

namespace Sms\commands;

use Sms\contracts\Command;
use Sms\Enums\Provider;

class ListCommand implements Command 
{
    public function execute(array $args)
    {
        foreach(Provider::keys() as $index =>$key)
        {
            $k = $index + 1;
            echo "[$k] $key";
            echo PHP_EOL;
        }
    }
}