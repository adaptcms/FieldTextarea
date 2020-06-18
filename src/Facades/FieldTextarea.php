<?php

namespace Adaptcms\FieldTextarea\Facades;

use Illuminate\Support\Facades\Facade;

class FieldTextarea extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'FieldTextarea';
    }
}
