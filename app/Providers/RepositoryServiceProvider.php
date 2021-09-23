<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Register Interface and Repository in here
        // You must place Interface in first place
        // If you dont, the Repository will not get readed.


        // restuant ResturantInterface && ResturantRspository
        $this->app->bind(
            'App\Interfaces\Resturant\ResturantInterface',
            'App\Repositories\Resturant\ResturantRepository'
        );

        // restuant MenuInterface && MenuRspository
        $this->app->bind(
            'App\Interfaces\Menu\MenuInterface',
            'App\Repositories\Menu\MenuRepository'
        );
    }
}