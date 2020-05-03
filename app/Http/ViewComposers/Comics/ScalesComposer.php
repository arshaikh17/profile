<?php

namespace App\Http\ViewComposers\Comics;

use Illuminate\View\View;

class ScalesComposer
{
	
	public function compose(View $view)
	{
		
		$scales							 =	config("comics.scales");
		
		$view->with("scales", $scales);
		
	}
	
}
