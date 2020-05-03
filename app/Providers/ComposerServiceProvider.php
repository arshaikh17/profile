<?php

namespace App\Providers;

use App\Http\ViewComposers\Comics\{
	CharactersComposer,
	BrandsComposer,
	ScalesComposer,
	VendorsComposer
};

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
	public function boot()
	{
		
		View::composer("comics.collectibles.index", CharactersComposer::class);
		
		View::composer("comics.collectibles.form", CharactersComposer::class);
		View::composer("comics.collectibles.form", BrandsComposer::class);
		View::composer("comics.collectibles.form", ScalesComposer::class);
		View::composer("comics.collectibles.form", VendorsComposer::class);
		
	}
}
