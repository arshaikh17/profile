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
				"id"					 =>	1,
				"institute"				 =>	"University of Westminster",
				"degree"				 =>	"MSc",
				"subject"				 =>	"Advanced Software Engineer",
				"startDate"				 =>	"2017",
				"endDate"				 =>	"2018",
				"city"					 =>	"London",
				"country"				 =>	"UK"
			],
			[
				"id"					 =>	2,
				"institute"				 =>	"Shaheed Zulfiqar Ali Bhutto Institute of Science and Technology",
				"degree"				 =>	"BSCS",
				"subject"				 =>	"Computer Science",
				"startDate"				 =>	"2013",
				"endDate"				 =>	"2017",
				"city"					 =>	"Karachi",
				"country"				 =>	"Pakistan"
			],
			[
				"id"					 =>	3,
				"institute"				 =>	"Army Public College",
				"degree"				 =>	"Intermediate",
				"subject"				 =>	"Pre-Engineering",
				"startDate"				 =>	"2011",
				"endDate"				 =>	"2013",
				"city"					 =>	"Karachi",
				"country"				 =>	"Pakistan"
			]
		];
		
		$address						 =	[
			"house_number"				 =>	4,
			"street"					 =>	"Colby Drive",
			"town"						 =>	"Bradwell",
			"city"						 =>	"Great Yarmouth",
			"postcode"					 =>	"NR31 9FT",
			"country"					 =>	"UK"
		];
		
		return json_encode([
			"Education"					 =>	$education,
			"Address"					 =>	$address
		]);
		
		
	}
	
}
