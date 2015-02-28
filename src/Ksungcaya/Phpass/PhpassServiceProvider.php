<?php namespace Ksungcaya\Phpass;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Guard;

class PhpassServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('ksungcaya/phpass');

        \Auth::extend('phpass', function() {

            $hasher = new PasswordHash(8, false);
            return new Guard(
                new PhpassUserProvider($hasher, 'User'),
                \App::make('session.store')
            );
        });
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->app->bind('hash', function()
        {
            return new PhpassHasher;
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return [];
	}

}