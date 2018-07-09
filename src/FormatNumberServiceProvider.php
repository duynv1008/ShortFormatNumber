<?php

namespace Dnv\FormatNumber;

use Illuminate\Support\ServiceProvider;

class FormatNumberServiceProvider extends ServiceProvider {
	protected $commands = [
		'Dnv\FormatNumber\commands\ShortFormat',
	];
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		if ($this->app->runningInConsole()) {
			$this->commands($this->commands);
		}
		$this->publishes([
			__DIR__ . '/config/typeformat.php' => config_path('typeformat.php'),
		], 'config');
	}

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind('FormatNumber', function () {
			return $this->app->make('DNV\Format-number\FormatNumber');
		});
	}
}
