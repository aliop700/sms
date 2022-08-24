<?php 

namespace Sms\Contracts;

interface Command 
{
    public function execute(array $args);
}