<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Client;

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
        Schema::defaultStringLength(191);

        view()->composer('clients.clients_chart_index', function($view)
        {
            $all_clients = Client::orderBy('country', 'asc')->get();
            $grouped_clients = $all_clients->groupBy('country');
            $all = Client::count();
            $view->with('grouped_clients', $grouped_clients)->with('all', $all);
        });
    }
}
