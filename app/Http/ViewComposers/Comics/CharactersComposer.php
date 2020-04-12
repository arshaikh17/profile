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
		
		$characters						 =	Character::whereIn("id", Collectible::groupBy("character_id")->pluck("character_id")->toArray())->get();
		
		$view->with("characters", $characters);
		
	}
	
}
