<?php


namespace Shift31\LaravelBasement;


use Illuminate\Support\ServiceProvider;
use Basement\Client;
use Config;
use App;

class LaravelBasementServiceProvider extends ServiceProvider {

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
		$this->package('shift31/laravel-basement');
	}

	/**
	 * Register the service provider.
	 *
	 * @return Client
	 */
	public function register()
	{
        $this->app->singleton('basement', function()
        {
            // retrieve settings from app/config/database.php
            extract(Config::get('database.couchbase'));

            $defaults = array(
                'name' => 'default',
                'host' => isset($host) ? $host : '127.0.0.1',
                'bucket' => isset($bucket) ? $bucket : 'default',
                'password' => isset($password) ? $password : null,
                'user' => null,
                'persist' => isset($persist_conn) ? $persist_conn : false,
                'connect' => true,
                'transcoder' => 'json',
				'environment' => preg_match('/dev|local/i', App::environment()) ? 'development' : App::environment()
            );

            return new Client($defaults);
        });
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('basement');
	}

}