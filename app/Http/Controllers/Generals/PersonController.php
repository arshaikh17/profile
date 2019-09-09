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
	 * Construct
	 */
	public function __construct()
	{
		
		$this->middleware("auth");
		
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
	
}
