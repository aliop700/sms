<?php 

namespace Sms\Enums;

use Exception;
use MyCLabs\Enum\Enum;
use Sms\Exceptions\SmsProviderNotSupportedException;

class Provider extends Enum
{
    private const D7SMS = 'D7SMS';

    /**
     * @param $value
     * @return Enum
     */
    public static function from($value): Enum
    {
        try {
            return parent::from($value);
        } catch (Exception $exception) {
            throw new SmsProviderNotSupportedException("Provider $value is not supported");
        }
    }
}