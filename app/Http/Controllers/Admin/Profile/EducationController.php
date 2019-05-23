<?php

namespace App\Http\Controllers\Admin\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Education;
use App\Skill;

class EducationController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"admin.profile.education.";
	
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
		
		return $this->getForm(new Education());
		
	}
	
	/**
	 * Displays edit view
	 * @param App\Education $education
	 */
	public function edit(Education $education)
	{
		
		return $this->getForm($education);
		
	}
	
	/**
	 * Saves education form 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		Education::saveEducation(new Education, $request);
		
		return redirect()->back()->with("status", "Education added.");
		
	}
	
	/**
	 * Updates education form 
	 * @param App\Education $education
	 * @param Illuminate\Http\Request $request
	 */
	public function update(Education $education, Request $request)
	{
		
		Education::saveEducation($education, $request);
		
		return redirect()->back()->with("status", "Education updated.");
		
	}
	
	/**
	 * Returns education form
	 * @param App\Education $education
	 */
	private function getForm(Education $education)
	{
		
		$degreeTypes					 =	Education::getDegreeTypes();
		
		return view(self::VIEW_PATH . "form", compact("education", "degreeTypes"));
		
	}
	
}
