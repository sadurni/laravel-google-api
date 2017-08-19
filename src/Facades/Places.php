<?php namespace Mrjonleek\GoogleApi\Facades;

use Illuminate\Support\Facades\Facade as BaseFacade;

class Places extends BaseFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'PlacesApi';
    }

}
