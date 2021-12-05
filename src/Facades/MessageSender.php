<?php


namespace Durranilab\Httpsms\Facades;


use Illuminate\Support\Facades\Facade;
use phpDocumentor\Reflection\Types\Static_;

/**
 * @method static getBalance ($params = null)
 * @method static sendMessage ($params = null)
 */
class MessageSender extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'MessageSender';
    }

}