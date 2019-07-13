<?php

namespace App\Http\Controllers\Comics;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comics\Character;

class CharacterController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"comics.index.characters.";
	
	/**
	 * Displays show view
	 * 
	 * @param App\Models\Comics\Character $character
	 */
	public function show(Character $character)
	{
		
		return view(self::VIEW_PATH . "show", compact("character"));
		
	}
}
