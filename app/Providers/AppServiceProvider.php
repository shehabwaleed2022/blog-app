<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Services\Newsletter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
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
    Gate::define('admin', function (User $user) {
      return $user->username == 'admin';
    });

    Gate::define('ownPost', function (User $user, Post $post) {
      return $user->id == $post->user_id;
    });

    \Blade::if('admin', function () {
      return request()->user()?->can('admin');
    });

    \Blade::if('ownPost', function (Post $post) {
      return request()->user()?->can('ownPost',$post);
    });

  }
}