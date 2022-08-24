<?php

use Sms\Constants\SMS;

return [
    'endpoint_url' => getenv(SMS::ENDPOINT),
    'auth_token'   => getenv(SMS::TOKEN),
    'sender'       => getenv(SMS::SENDER),
    'dlr'          => getenv(SMS::WITH_DLR),
    'dlr_url'      => getenv(SMS::DLR_URL),
    'dlr_level'    => getenv(SMS::DLR_LEVEL)
];