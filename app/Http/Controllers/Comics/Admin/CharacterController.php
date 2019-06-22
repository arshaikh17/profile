<?php

namespace App\Http\Controllers\Comics\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Comics\Character;

class CharacterController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"comics.admin.characters.";
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		
		$this->middleware("auth");
		
	}
	
	/**
	 * Displays index view
	 */
	public function index()
	{
		
		$characters						 =	Character::all();
		
		return view(self::VIEW_PATH . "index", compact("characters"));
		
	}
	
	/**
	 * Displays create view
	 */
	public function create()
	{
		
		return $this->getForm(new Character());
		
	}
	
	/**
	 * Displays edit view
	 * 
	 * @param App\Character $character
	 */
	public function edit(Character $character)
	{
		
		return $this->getForm($character);
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		Character::saveCharacter(new Character, $request);
		
		return redirect()->back()->with("status", "Record added.");
		
	}
	
	/**
	 * Updates record
	 * 
	 * @param App\Character $character
	 * @param Illuminate\Http\Request $request
	 */
	public function update(Character $character, Request $request)
	{
		
		Character::saveCharacter($character, $request);
		
		return redirect()->back()->with("status", "Record updated.");
		
	}
	
	/**
	 * Returns form
	 * 
	 * @param App\Character $character
	 */
	private function getForm(Character $character)
	{
		
		return view(self::VIEW_PATH . "form", compact("character"));
		
	}
	
}
