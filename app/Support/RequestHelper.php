<?php

namespace App\Support;

class RequestHelper
{
    /**
     * Create a new class instance.
     */
    public static function int($key)
    {
        return request()->filled($key)
            ? (int) request($key)
            : null;
    }
}
