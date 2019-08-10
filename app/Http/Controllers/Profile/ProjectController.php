<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Profile\Project;
use App\Models\Profile\Experience;
use App\Models\Profile\Skill;

class ProjectController extends Controller
{
	
	/**
	 * Constants
	 */
	CONST VIEW_PATH						 =	"profile.projects.";
	
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
		
		$projects						 =	Project::all();
		
		return view(self::VIEW_PATH . "index", compact("projects"));
		
	}
	
	/**
	 * Displays create view
	 */
	public function create()
	{
		
		return $this->getForm(new Project());
		
	}
	
	/**
	 * Displays edit view
	 * 
	 * @param App\Project $project
	 */
	public function edit(Project $project)
	{
		
		return $this->getForm($project);
		
	}
	
	/**
	 * Saves project form
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		Project::saveProject(new Project, $request);
		
		return redirect()->back()->with("message", "Project added.");
		
	}
	
	/**
	 * Updates project form
	 * 
	 * @param App\Project $project
	 * @param Illuminate\Http\Request $request
	 */
	public function update(Project $project, Request $request)
	{
		
		Project::saveProject($project, $request);
		
		return redirect()->back()->with("message", "Project updated.");
		
	}
	
	/**
	 * Returns project form
	 * 
	 * @param App\Project $project
	 */
	private function getForm(Project $project)
	{
		
		$skills							 =	Skill::all();
		$experiences					 =	Experience::all();
		
		return view(self::VIEW_PATH . "form", compact("project", "skills", "experiences"));
		
	}
	
}
