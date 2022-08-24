<?php

namespace Sms\Providers;

use SY\DataObject\Contracts\DataObject;
use SY\DataObject\Support\DataObjectTrait;
use SY\DataObject\Support\ObjectReadAccess;

/**
 * @property string endpoint_url
 * @property string auth_token
 * @property string sender
 * @property string dlr
 * @property string dlr_url
 * @property string dlr_level
 */
class SmsConfig implements DataObject
{
    use DataObjectTrait;
    use ObjectReadAccess;

    public function __construct(array $properties = [])
    {
        $this->_properties = [
            'endpoint_url' => '',
            'auth_token'   => '',
            'sender'       => '',
            'dlr'          => '',
            'dlr_url'      => '',
            'dlr_level'    => ''
        ];

        $this->hydrate($properties);
    }
}