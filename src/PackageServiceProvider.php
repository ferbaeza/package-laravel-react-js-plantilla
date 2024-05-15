<?php

namespace Baezeta\App;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Baezeta\App\Shared\Laravel\Bindings\TrazerBindings;

class PackageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    protected array $bindingProvider = [TrazerBindings::class]; 

    public function register()
    {
        foreach ($this->bindingProvider as $packageRegister) {
            $register = new $packageRegister($this->app);
            $register->register();
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /** Registrar Routes */
        $this->loadRoutesFrom(__DIR__. '/Shared/Laravel/Web/PackageRoutes.php');
        /** Registrar Views */
        /** Primer argumento es el directorio donde se encuentra la vista, el segundo argumento el nombre del paquete */
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'plantilla');

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
