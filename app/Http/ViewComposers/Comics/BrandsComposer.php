<?php

namespace App\Http\ViewComposers\Comics;

use Illuminate\View\View;

class BrandsComposer
{
	
	public function compose(View $view)
	{
		
		$brands							 =	config("comics.brands");
		
		$view->with("brands", $brands);
		
	}
	
}
