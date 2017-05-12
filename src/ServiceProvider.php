<?php namespace Mortimer\HeaderTokenGuard;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as AuthServiceProvider;
use Illuminate\Support\Facades\Auth;

class ServiceProvider extends AuthServiceProvider
{
  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot()
  {
    Auth::extend('header_token', function ($app, $name, array $config) {
      return new HeaderTokenGuard(Auth::createUserProvider($config['provider']), $this->app['request'], $config['input_key'], $config['storage_key']);
    });
  }
}
