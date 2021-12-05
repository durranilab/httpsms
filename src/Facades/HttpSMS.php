<?php


namespace Durranilab\Httpsms\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * @method static getBalance ($params = [])
 * @method static sendMessage ($params = [])
 */
class HttpSMS extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'HttpSMS';
    }

}