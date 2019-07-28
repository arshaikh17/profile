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
	CONST VIEW_PATH						 =	"comics.characters.";
	
	/**
	 * Constructor
	 */
	public function __construct()
	{
		
		$this->middleware("auth", [
			"only"						 =>	[
				"create",
				"edit",
				"store",
				"update",
				"search",
				"getForm",
			]
		]);
		
	}
	
	/**
	 * Displays index view
	 */
	public function index()
	{
		
		$characters						 =	Character::paginate(10);
		
		return view(self::VIEW_PATH . "index", compact("characters"));
		
	}
	
	/**
	 * Displays show view
	 * 
	 * @param App\Models\Comics\Character $character
	 */
	public function show(Character $character)
	{
		
		return view(self::VIEW_PATH . "show", compact("character"));
		
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
		
		return redirect()->back()->with("message", "Record added.");
		
	}
	
	/**
	 * Updates record
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Comics\Character $character
	 */
	public function update(Request $request, Character $character)
	{
		
		Character::saveCharacter($character, $request);
		
		return redirect()->back()->with("message", "Record updated.");
		
	}
	
	/**
	 * Performs search on model
	 * 
	 * @param Illuminate\Http\Request $request
	 * @return View $view
	 */
	public function search(Request $request)
	{
		
		$term							 =	$request->term;
		
		$view							 =	"";
		
		$characters						 =	Character::searchCharacters($term);
		
		foreach ($characters as $character) $view			 .=	view("comics.partials.characters-table-body-row", ["character" => $character])->render();
		
		return response()->json([
			"message"					 =>	"Success",
			"data"						 =>	$view
		], 200);
		
	}
	
	/**
	 * Returns form
	 * 
	 * @param App\Models\Comics\Character $character
	 */
	private function getForm(Character $character)
	{
		
		return view(self::VIEW_PATH . "form", compact("character"));
		
	}
}
