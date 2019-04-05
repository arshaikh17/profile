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
		
		$emails							 =	[
			0							 =>	"arshaikh_17@hotmail.com",
			1							 =>	"ali.rasheed@artisticdevelopers.com"
		];
		
		$numbers						 =	[
			0							 =>	[
				"number"				 =>	"+44 (0) 7411 404816",
				"location"				 =>	"UK"
			],
			1							 =>	[
				"number"				 =>	"+92 (0) 336 325 9986",
				"location"				 =>	"Pakistan"
			]
			
		];
		
		$skills							 =	[
			"Backend Programming"		 =>	[
				"PHP",
				"NodeJS",
				"Python",
				"C#",
			],
			"JavaScript Libraries/Frameworks"				 =>	[
				"JavaScript",
				"jQuery",
				"VueJS",
				"ReactJS",
				"AngularJS",
			],
			"Web Frameworks"			 =>	[
				"Laravel",
				"Zend Framework",
				"Symfony"
			],
			"Frontend Designing Libraries"					 =>	[
				"HTML/CSS",
				"Bootstrap 3",
				"Bootstrap 4",
				"MaterializeCSS",
			],
			"Source Control"			 =>	[
				"Git",
			],
			"Project Management Tools"	 =>	[
				"Primavera",
				"MS Project",
				"Trello",
			],
			"Operating Systems"			 =>	[
				"Windows",
				"Linux"
			]
		];
		
		$experience						 =	[
			[
				"currentlyWorking"		 =>	false,
				"startDate"				 =>	[
					"month"				 =>	"June",
					"year"				 =>	"2018"
				],
				"endDate"				 =>	[
					"month"				 =>	"March",
					"year"				 =>	"2019"
				],
				"company"				 =>	"Dotfive ltd",
				"location"				 =>	[
					"city"				 =>	"London",
					"country"			 =>	"UK"
				],
				"type"					 =>	"permanent",
				"position"				 =>	"Web Developer",
				"techStack"				 =>	[
					"PHP", "Laravel", "Zend Framework 3", "HTML5",
					"CSS", "jQuery", "VueJS", "NodeJS", "MySQL", "Doctrine 2"
				]
			],
		];
		
		return json_encode([
			"Education"					 =>	$education,
			"Address"					 =>	$address,
			"Emails"					 =>	$emails,
			"Numbers"					 =>	$numbers,
			"Skills"					 =>	$skills
		]);
		
		
	}
	
}
