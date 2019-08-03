<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profile\Experience;
use App\Models\Profile\Skill;

class ExperienceController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"profile.experiences.";
	
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
		
		$experiences					 =	Experience::all();
		
		return view(self::VIEW_PATH . "index", compact("experiences"));
		
	}
	
	/**
	 * Displays create view
	 */
	public function create()
	{
		
		return $this->getForm(new Experience());
		
	}
	
	/**
	 * Displays edit view
	 * 
	 * @param App\Experience $experience
	 */
	public function edit(Experience $experience)
	{
		
		return $this->getForm($experience);
		
	}
	
	/**
	 * Saves experience form
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		Experience::saveExperience(new Experience, $request);
		
		return redirect()->back()->with("status", "Experience added.");
		
	}
	
	/**
	 * Updates experience form
	 * 
	 * @param App\Experience $experience
	 * @param Illuminate\Http\Request $request
	 */
	public function update(Experience $experience, Request $request)
	{
		
		Experience::saveExperience($experience, $request);
		
		return redirect()->back()->with("status", "Experience updated.");
		
	}
	
	/**
	 * Returns experience form
	 * 
	 * @param App\Experience $experience
	 */
	private function getForm(Experience $experience)
	{
		
		$types							 =	Experience::getTypes();
		$skills							 =	Skill::all();
		
		return view(self::VIEW_PATH . "form", compact("experience", "types", "skills"));
		
	}
	
}
