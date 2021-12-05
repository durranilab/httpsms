<?php


namespace Durranilab\Httpsms\Tests;


use Durranilab\Httpsms\HttpSMSBaseServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            HttpSMSBaseServiceProvider::class
        ];
    }
}