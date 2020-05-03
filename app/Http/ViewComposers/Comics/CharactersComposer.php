<?php

namespace App\Http\ViewComposers\Comics;

use Illuminate\View\View;

use App\Models\Comics\{
	Character,
	Collectible
};

class CharactersComposer
{
	
	public function compose(View $view)
	{
		
		$characters						 =	Character::all();
		
		$view->with("characters", $characters);
		
	}
	
}
