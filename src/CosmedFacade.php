<?php

namespace Aitbella\Cosmed;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Aitbella\Cosmed\Skeleton\SkeletonClass
 */
class CosmedFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'cosmed';
    }
}
