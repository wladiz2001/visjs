<?php

namespace Wladiz2001\Visjs\Facades;

use Illuminate\Support\Facades\Facade;

class Visjs extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'visjs';
    }
}
