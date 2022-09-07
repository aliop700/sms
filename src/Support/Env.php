<?php

namespace Sms\Support;

class Env
{
    /**
     * @param string $name
     * @return string|bool
     */
    public static function get(string $name)
    {
        return getenv($name);
    }
}