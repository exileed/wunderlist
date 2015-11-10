<?php namespace JohnRivs\Wunderlist\Laravel\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Wunderlist
 *
 * @package JohnRivs\Wunderlist\Laravel\Facades
 */
class Wunderlist extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'wunderlist';
    }
}
