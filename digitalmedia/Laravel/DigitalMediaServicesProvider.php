<?php namespace DigitalMedia\Laravel;

use Illuminate\Support\ServiceProvider;
use DigitalMedia\Providers\LibsynProvider;
use DigitalMedia\Providers\YouTubeProvider;
use DigitalMedia\Utility\ProvidersManager;

class DigitalMediaServicesProvider extends ServiceProvider {

	/**
	* Indicates if the loading of the provider should be defered.
	*
	* @var bool
	*/
	//protected $defer = true;

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('DigitalMedia\Interfaces\DigitalMediaProvidersManager', 'DigitalMedia\Utility\ProvidersManager');
	}
}
