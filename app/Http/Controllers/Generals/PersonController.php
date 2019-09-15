<?php

namespace App\Http\Controllers\Generals;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Generals\{
	Person
};

class PersonController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"generals.persons.";
	
	/**
	 * Construct
	 */
	public function __construct()
	{
		
		$this->middleware("auth", [
			"except"					 =>	[
				"publicHistory",
				"publicHistoryPost",
			],
		]);
		
	}
	
	/**
	 * Displays index view
	 */
	public function index()
	{
		
		return view(self::VIEW_PATH . "index", [
			"persons"					 =>	Person::all(),
		]);
		
	}
	
	/**
	 * Saves person
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		Person::savePerson(new Person, $request->toArray());
		
		return redirect()->back()->with("status", "Person saved");
		
	}
	
	/**
	 * Updates person
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Person $person
	 */
	public function update(Request $request, Person $person)
	{
		
		Person::savePerson($person, $request->toArray());
		
		return redirect()->back()->with("status", "Person saved");
		
	}
	
	/**
	 * Destroys person
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Person $person
	 */
	public function destroy(Request $request, Person $person)
	{
		
		Person::removePerson($person);
		
		return redirect()->back()->with("status", "Person removed");
		
	}
	
	/**
	 * Displays public history view
	 * 
	 * @param Integer|String $identity
	 */
	public function publicHistory($identity, $pass)
	{
		
		$person							 =	ctype_digit($identity) ? Person::find($identity) : Person::findByEmail($identity);
		
		if ($person) {
			
			$password						 =	md5($pass);
			
			if ($person->password == $password) {
				
				return view(self::VIEW_PATH . "public.history", compact("person"));
				
			}
			
		}
		
		dd($person);
		//$person							 =	Person::find();
		
	}
	
}
