<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Company;
use App\Observers\CompanyObserver;
use App\Services\CompanyService;
use App\Services\EmployeeService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton('companyService', function () {
            return new CompanyService;
        });
        $this->app->singleton('employeeService', function () {
            return new EmployeeService;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Company::observe(CompanyObserver::class);
    }
}
