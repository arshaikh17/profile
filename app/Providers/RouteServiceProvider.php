<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
	
	/**
	 * This namespace is applied to your controller routes.
	 *
	 * In addition, it is set as the URL generator"s root namespace.
	 *
	 * @var string
	 */
	protected $namespace				 =	"App\Http\Controllers";
	
	/**
	 * Define your route model bindings, pattern filters, etc.
	 *
	 * @return void
	 */
	public function boot()
	{
		
		parent::boot();
		
	}
	
	/**
	 * Define the routes for the application.
	 *
	 * @return void
	 */
	public function map()
	{
		
		$this->mapApiRoutes();
		
		$this->mapWebRoutes();
		
		$this->mapProfileRoutes();
		
		$this->mapComicsRoutes();
		
		$this->mapWishlistsRoutes();
		
		$this->mapExpensesRoutes();
		
	}
	
	/**
	 * Define the "web" routes for the application.
	 *
	 * These routes all receive session state, CSRF protection, etc.
	 *
	 * @return void
	 */
	protected function mapWebRoutes()
	{
		
		Route::middleware("web")
			->namespace($this->namespace)
			->group(base_path("routes/web.php"))
		;
		
	}
	
	/**
	 * Define the "api" routes for the application.	
	 *
	 * These routes are typically stateless.
	 *
	 * @return void
	 */
	protected function mapApiRoutes()
	{
		
		Route::prefix("api")
			->middleware("api")
			->namespace($this->namespace)
			->group(base_path("routes/api.php"))
		;
		
	}
	
	/**
	 * Define the "profile" routes for the application.
	 *
	 * @return void
	 */
	protected function mapProfileRoutes()
	{
		
		Route::middleware("web")
			->namespace($this->namespace)
			->group(base_path("routes/profile.php"))
		;
		
	}
	
	/**
	 * Define the "comics" routes for the application.
	 *
	 * @return void
	 */
	protected function mapComicsRoutes()
	{
		
		Route::middleware("web")
			->namespace($this->namespace)
			->group(base_path("routes/comics.php"))
		;
		
	}
	
	/**
	 * Define the "wishlists" routes for the application.
	 *
	 * @return void
	 */
	protected function mapWishlistsRoutes()
	{
		
		Route::middleware("web")
			->namespace($this->namespace)
			->group(base_path("routes/wishlists.php"))
		;
		
	}
	
	/**
	 * Define the "expenses" routes for the application.
	 *
	 * @return void
	 */
	protected function mapExpensesRoutes()
	{
		
		Route::middleware("web")
			->namespace($this->namespace)
			->group(base_path("routes/expenses.php"))
		;
		
	}
	
}
