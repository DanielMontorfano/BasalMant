<?php

// app/Providers/MantenimientoPlanServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\MantenimientoOrdenService;

class MantenimientoOrdenServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(MantenimientoOrdenService::class, function ($app) {
            return new MantenimientoOrdenService();
        });
    }

    
}
