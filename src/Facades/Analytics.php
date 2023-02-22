<?php

namespace Vormkracht10\Analytics\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Vormkracht10\Analytics\Analytics
 */
class Analytics extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Vormkracht10\Analytics\Analytics::class;
    }
}
