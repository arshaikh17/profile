<?php

namespace App\Http\ViewComposers\Comics;

use Illuminate\View\View;

class VendorsComposer
{
	
	public function compose(View $view)
	{
		
		$vendors						 =	config("comics.vendors");
		
		$view->with("vendors", $vendors);
		
	}
	
}
