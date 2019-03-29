<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller {
	
	/**
	 * Constructor
	 */
	public function __construct () {
		
		
		
	}
	
	/**
	 * Index method
	 * @return Array $data
	 */
	public function index () {
		
		$data							 =	[
			"csrf_token"				 =>	csrf_token()
		];
		
		return view("index.index", compact("data"));
		
	}
	
	/**
	 * Returns App main data and configuration values
	 * @param Illuminate\Http\Request $request
	 * @return Array $data
	 */
	public function appData (Request $request) {
		
		$education						 =	[
			[
				"institute"				 =>	"University of Westminster",
				"degree"				 =>	"MSc",
				"subject"				 =>	"Advanced Software Engineer",
				"startDate"				 =>	strtotime("16-09-2017"),
				"endDate"				 =>	strtotime("16-09-2018"),
				"city"					 =>	"London",
				"country"				 =>	"UK"
			],
			[
				"institute"				 =>	"Shaheed Zulfiqar Ali Bhutto Institute of Science and Technology",
				"degree"				 =>	"BSCS",
				"subject"				 =>	"Computer Science",
				"startDate"				 =>	strtotime("11-08-2013"),
				"endDate"				 =>	strtotime("11-05-2017"),
				"city"					 =>	"Karachi",
				"country"				 =>	"Pakistan"
			],
			[
				"institute"				 =>	"Army Public College",
				"degree"				 =>	"Intermediate",
				"subject"				 =>	"Pre-Engineering",
				"startDate"				 =>	strtotime("07-08-2011"),
				"endDate"				 =>	strtotime("11-06-2013"),
				"city"					 =>	"Karachi",
				"country"				 =>	"Pakistan"
			]
		];
		
		return json_encode([
			"Education"					 =>	$education
		]);
		
		
	}
	
}
