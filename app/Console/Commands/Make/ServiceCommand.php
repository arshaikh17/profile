<?php

namespace App\Console\Commands\Make;

use Illuminate\Console\Command;

class ServiceCommand extends Command
{
	
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature				 =	"make:service {--name=}";
	
	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description				 =	"Creates a new service class";
	
	/**
	 * Scoped variables
	 */
	protected $service					 =	[];
	
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
		
		$this->buildDirectories();
		
		$this->buildStub();
		
		$this->info($this->service["service"]["namespace"] . "\\" . $this->service["service"]["name"] . " created.");
		
	}
	
	/**
	 * Builds directories
	 */
	private function buildDirectories()
	{
		
		$names							 =	explode("/", $this->option("name"));
		
		array_unshift($names, "Services");
		
		$service						 =	array_pop($names);
		$prefix							 =	str_replace("Service", "", $service);
		$namespace						 =	"App\\" . implode("\\", $names);
		
		$controller						 =	$prefix . "Controller";
		$controllerNamespace			 =	"App\Http\\" . str_replace("Services", "Controllers", implode("\\", $names)) . "\\" . $controller;
		
		$modelNamespace					 =	"App\\" . str_replace("Services", "Models", implode("\\", $names)) . "\\" . $prefix;
		
		$parent							 =	false;
		
		foreach ($names as $name) {
			
		$path							 =	app_path();
			$path						 .=	$parent ?: "";
			$path						 .=	"\\" . $name;
			$parent						 =	"\\" . $name;
			
			if (!is_dir($path)) mkdir($path);
			
		}
		
		$this->service					 =	[
			"prefix"					 =>	$prefix,
			"path"						 =>	$path,
			"service"					 =>	[
				"name"					 =>	$service,
				"namespace"				 =>	$namespace,
			],
			"controller"				 =>	[
				"name"					 =>	$controller,
				"namespace"				 =>	$controllerNamespace,
			],
			"model"						 =>	[
				"name"					 =>	$prefix,
				"namespace"				 =>	$modelNamespace,
				"variable"				 =>	"$" . camel_case($prefix),
			]
		];
		
	}
	
	/**
	 * Builds stub
	 */
	private function buildStub()
	{
		
		$stub							 =	file_get_contents(base_path() . "/resources/stubs/service.stub");
		$stub							 =	str_replace("__namespace__", $this->service["service"]["namespace"], $stub);
		$stub							 =	str_replace("__controller_namespace__", $this->service["controller"]["namespace"], $stub);
		$stub							 =	str_replace("__service__", $this->service["service"]["name"], $stub);
		$stub							 =	str_replace("__model__", $this->service["model"]["name"], $stub);
		$stub							 =	str_replace("__model_namespace__", $this->service["model"]["namespace"], $stub);
		$stub							 =	str_replace("__model_variable__", $this->service["model"]["variable"], $stub);
		
		file_put_contents($this->service["path"] . "\\" . $this->service["service"]["name"] . ".php", $stub);
		
	}
	
}
