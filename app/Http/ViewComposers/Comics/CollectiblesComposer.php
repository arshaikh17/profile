<?php

namespace App\Http\ViewComposers\Comics;

use Illuminate\View\View;

use App\Models\Comics\Collectible;

class CollectiblesComposer
{
	
	public function compose(View $view)
	{
		
		$collectibles					 =	Collectible::all();
		
		$view->with("collectibles", $collectibles);
		
	}
	
}
