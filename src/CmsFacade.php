<?php

namespace Rizalmovic\Cms;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Rizalmovic\Cms\Cms
 */
class CmsFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'cms';
    }
}
