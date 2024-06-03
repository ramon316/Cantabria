<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /**Agregamos nuestra directiva de dinero */
        Blade::directive('dinero', function($dinero){
            return "<?php echo number_format($dinero); ?>";
        });
    }
}
