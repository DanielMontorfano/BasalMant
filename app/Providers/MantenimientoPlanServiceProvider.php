<?php

// app/Providers/MantenimientoPlanServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MantenimientoPlanService;

class MantenimientoPlanServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(MantenimientoPlanService::class, function ($app) {
            return new MantenimientoPlanService();
        });
    }

    
}
