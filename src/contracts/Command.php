<?php 

namespace Sms\contracts;

interface Command 
{
    public function execute(array $args);
}