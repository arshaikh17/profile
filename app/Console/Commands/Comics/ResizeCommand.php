<?php

namespace App\Console\Commands\Comics;

use Illuminate\Console\Command;

use Intervention\Image\ImageManagerStatic as Image;

use Storage;

class ResizeCommand extends Command
{
	
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature				 =	"comics:resize";
	
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description				 =	"Resizes images dimensions to match comics covers.";
	
	/**
	 * Scoped variables
	 */
	private $paths						 =	[
		"issues"						 =>	[
			"base"						 =>	"/commands/issues/base/",
			"processed"					 =>	"/commands/issues/processed/",
			"sizes"						 =>	[
				"width"					 =>	400,
				"height"				 =>	613,
			]
		],
		"series"						 =>	[
			"base"						 =>	"/commands/series/base/",
			"processed"					 =>	"/commands/series/processed/",
			"sizes"						 =>	[
				"width"					 =>	250,
				"height"				 =>	107,
			]
		]
	];
	
	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		
		parent::__construct();
		
	}
	
	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle()
	{
		
		foreach ($this->paths as $pathKey => $path) {
			
			$dirPath					 =	public_path() . $path["base"];
			$files						 =	new \DirectoryIterator($dirPath);
			
			foreach ($files as $file) {
			
				if ($file->isDot()) continue;
				
				$image					 =	Image::make($dirPath . "/" . $file)->resize($path["sizes"]["width"], $path["sizes"]["height"]);
				$image->save(public_path() . $path["processed"] . $file->getFilename(), 60);
				
				$this->info($file);
				
			}
			
			$this->info("{$pathKey} Finished.");
			
		}
		
	}
	
}
