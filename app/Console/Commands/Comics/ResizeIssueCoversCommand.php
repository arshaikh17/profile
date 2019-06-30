<?php

namespace App\Console\Commands\Comics;

use Illuminate\Console\Command;

use Intervention\Image\ImageManagerStatic as Image;

use Storage;

class ResizeIssueCoversCommand extends Command
{
	
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature				 =	"comics:resize-issue-covers";
	
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description				 =	"Resizes images dimensions to match comic issue cover.";
	
	/**
	 * Scoped variables
	 */
	private $base_path					 =	"/commands/issues/base/";
	private $processed_path				 =	"/commands/issues/processed/";
	
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
		
		$dirPath						 =	public_path() . $this->base_path;
		
		$files							 =	new \DirectoryIterator($dirPath);
		
		foreach ($files as $file) {
			
			if ($file->isDot()) continue;
			
			$image						 =	Image::make($dirPath . "/" . $file)->resize(400, 613);
			$image->save(public_path() . $this->processed_path . $file->getFilename(), 60);
			
			$this->info($file);
			
		}
		
	}
	
}
