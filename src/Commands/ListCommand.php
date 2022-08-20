<?php 

namespace Sms\Commands;

use Sms\Contracts\Command;
use Sms\Enums\Provider;

class ListCommand implements Command 
{
    /**
     * @param array $args
     * @return void
     */
    public function execute(array $args)
    {
        foreach(Provider::keys() as $index => $key)
        {
            $k = $index + 1;
            echo "$k. $key";
            echo PHP_EOL;
        }
    }
}