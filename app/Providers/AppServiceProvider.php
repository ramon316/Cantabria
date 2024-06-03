<?php

namespace App\Providers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       
        /* Mandamos llamar al paginador de bootstrap */
      /*   Paginator::useBootstrap(); */
        //generamos un gate de los roles 
        $this->register();

        Gate::define('Administrador', function ($user) {
           if ($user->role == 'Administrador'){
               return true;
           }
           else{
               return false;
           }
       });

       Gate::define('Ventas', function($user){
           if($user->role == 'Ventas'){
               return true;
           }
           else{
               return false;
           }
       });
    }
}
