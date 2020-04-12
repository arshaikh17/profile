<?php

namespace App\Providers;

use App\Http\ViewComposers\Comics\{
	CharactersComposer
};

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
	public function boot()
	{
		
		View::composer("comics.collectibles.index", CharactersComposer::class);
		
	}
}
