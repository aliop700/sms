<?php

namespace Sms\Constants;

use Sms\Providers\D7SMSProvider;

/**
 * SMS class.
 *
 * @brief Contains all environment variables names|keys.
 */
final class SMS
{

    /**
     * Prevent instantiation.
     */
    private function __construct()
    {
    }

    public const TOKEN     = 'SMS_AUTH_TOKEN';
    public const ENDPOINT  = 'SMS_ENDPOINT';
    public const SENDER    = 'SMS_SENDER';
    public const WITH_DLR  = 'SMS_WITH_DLR';
    public const DLR_URL   = 'SMS_DLR_URL';
    public const DLR_LEVEL = 'SMS_DLR_LEVEL';
}