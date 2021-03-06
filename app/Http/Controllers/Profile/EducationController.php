<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profile\Education;
use App\Models\Profile\Skill;

class EducationController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"profile.educations.";
	
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
		
		$educations					 =	Education::all();
		
		return view(self::VIEW_PATH . "index", compact("educations"));
		
	}
	
	/**
	 * Displays create view
	 */
	public function create()
	{
		
		return $this->getForm(new Education);
		
	}
	
	/**
	 * Displays edit view
	 * 
	 * @param App\Models\Profile\Education $education
	 */
	public function edit(Education $education)
	{
		
		return $this->getForm($education);
		
	}
	
	/**
	 * Saves education form
	 *
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		Education::saveEducation(new Education, $request->toArray());
		
		return redirect()->back()->with("message", "Education added.");
		
	}
	
	/**
	 * Updates education form
	 * 
	 * @param App\Education $education
	 * @param Illuminate\Http\Request $request
	 */
	public function update(Education $education, Request $request)
	{
		
		Education::saveEducation($education, $request->toArray());
		
		return redirect()->back()->with("message", "Education updated.");
		
	}
	
	/**
	 * Returns education form
	 * 
	 * @param App\Models\Profile\Education $education
	 */
	private function getForm(Education $education)
	{
		
		$degreeTypes					 =	Education::getDegreeTypes();
		
		return view(self::VIEW_PATH . "form", compact("education", "degreeTypes"));
		
	}
	
}
