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
				"id"					 =>	4,
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
				],
				"responsibilities"		 =>	[
					"Appointed as web developers of PHP.",
					"Worked on backend in PHP 7 and NodeJS and in different frameworks such as Laravel, Zend Framework 3",
					"Worked on frontend in Javascript, jQuery, HTML5, CSS"
				]
			],
			[
				"id"					 =>	3,
				"currentlyWorking"		 =>	false,
				"startDate"				 =>	[
					"month"				 =>	"July",
					"year"				 =>	"2017"
				],
				"endDate"				 =>	[
					"month"				 =>	"Feb",
					"year"				 =>	"2018"
				],
				"company"				 =>	"TradeOptimize",
				"location"				 =>	[
					"city"				 =>	"Karachi",
					"country"			 =>	"Pakistan"
				],
				"type"					 =>	"permanent",
				"position"				 =>	"Software Engineer",
				"techStack"				 =>	[
					"PHP", "Laravel", "HTML5",
					"CSS", "jQuery", "MySQL", "C#", "ASP MVC", "MS SQL",
					"Rest APIs",
				],
				"responsibilities"		 =>	[
					"Appointed as one of the lead developers of PHP LARAVEL and mid developer of C#.",
					"Introduced a custom framework for CMS as proprietary asset of TradeOptimize.",
					"Developed organizational website of whole company along with, CMS, involving both selling and buying module.",
					"Developed REST APIs in order to integrate in other platforms associated with company."
				]
			],
			[
				"id"					 =>	2,
				"currentlyWorking"		 =>	true,
				"startDate"				 =>	[
					"month"				 =>	"August",
					"year"				 =>	"2017"
				],
				"endDate"				 =>	[
					"month"				 =>	"",
					"year"				 =>	""
				],
				"company"				 =>	"ArtisticDevelopers Ltd",
				"location"				 =>	[
					"city"				 =>	"Karachi",
					"country"			 =>	"Pakistan"
				],
				"type"					 =>	"permanent",
				"position"				 =>	"Software Engineer",
				"techStack"				 =>	[
					"PHP", "Laravel", "HTML5",
					"CSS", "jQuery", "MySQL", "C#", "ASP MVC", "ASP .NET", "MS SQL",
					"Rest APIs", "Symfony", "iOS",
				],
				"responsibilities"		 =>	[
					"Managed team of 11 developers. Took responsibility to execute and deliver projects to the companies.",
					"Played a role as Project Manager to Web Development team and successfully delivered 6 projects within 4 months."
				]
			],
			[
				"id"					 =>	1,
				"currentlyWorking"		 =>	false,
				"startDate"				 =>	[
					"month"				 =>	"July",
					"year"				 =>	"2016"
				],
				"endDate"				 =>	[
					"month"				 =>	"September",
					"year"				 =>	"2016"
				],
				"company"				 =>	"Precision Engineering and Consultancy",
				"location"				 =>	[
					"city"				 =>	"Muscat",
					"country"			 =>	"Oman"
				],
				"type"					 =>	"intern",
				"position"				 =>	"Software Engineer",
				"techStack"				 =>	[
					"PHP", "OOP", "HTML5",
					"CSS", "jQuery", "MySQL", "C#", "JAVA", "MS SQL",
					"Rest APIs", "Optimisation"
				],
				"responsibilities"		 =>	[
					"Optimized the database queries for performance in existing proprietary software of PEC.",
					"Developed a management module for their existing management system for their assets.",
					"Designed and developed management module as web-based application and created REST APIs to integrate inventory in other modules.",
				]
			],
		];
		
		return json_encode([
			"Education"					 =>	$education,
			"Address"					 =>	$address,
			"Emails"					 =>	$emails,
			"Numbers"					 =>	$numbers,
			"Skills"					 =>	$skills,
			"Experience"				 =>	$experience,
		]);
		
		
	}
	
}
