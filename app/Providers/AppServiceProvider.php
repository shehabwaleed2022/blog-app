<?php

namespace App\Providers;

use App\Services\Newsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Nette\Utils\Paginator;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    // You can bind your services here in the service container
    app()->bind('Newsletter', function () {
      return new Newsletter();
    });

    
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    //
  }
}