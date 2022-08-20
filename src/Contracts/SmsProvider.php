<?php 

namespace Sms\Contracts;

/**
 * When implementing this interface,the concrete class
 * name should follow the following naming criteria:
 * - Starts with uppercase.
 * - Should have Postfix 'Provider'
 * - Under the 'SMS\Providers' namespace.
 * - e.g. SMS\Provider\O2SmsProvider.
 */
interface SmsProvider 
{
    public function send(string $number, string $message);
}