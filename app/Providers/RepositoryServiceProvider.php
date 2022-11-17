<?php

namespace App\Providers;

use App\Repositories\ClientRepository;
use App\Repositories\CurrencyReposetory;
use App\Repositories\CustomerOrderReposetory;
use App\Repositories\DeliveryTypeReposetory;
use App\Repositories\GoodReposetory;
use App\Repositories\Interfaces\ClientInterface;
use App\Repositories\Interfaces\CurrencyInterface;
use App\Repositories\Interfaces\CustomerOrderInterface;
use App\Repositories\Interfaces\DeliveryTypeInterface;
use App\Repositories\Interfaces\GoodInterface;
use App\Repositories\Interfaces\PaymentTypeInterface;
use App\Repositories\PaymentTypeReposetory;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ClientInterface::class,ClientRepository::class);
        $this->app->bind(CurrencyInterface::class,CurrencyReposetory::class);
        $this->app->bind(CustomerOrderInterface::class,CustomerOrderReposetory::class);
        $this->app->bind(DeliveryTypeInterface::class,DeliveryTypeReposetory::class);
        $this->app->bind(GoodInterface::class,GoodReposetory::class);
        $this->app->bind(PaymentTypeInterface::class,PaymentTypeReposetory::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
