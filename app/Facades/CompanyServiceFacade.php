<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class CompanyServiceFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'companyService';
    }
}
