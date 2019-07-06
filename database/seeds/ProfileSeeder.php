<?php

use Illuminate\Database\Seeder;

use App\Detail;

class ProfileSeeder extends Seeder
{
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		$keys							 =	[
			"first_name"				 =>	"",
			"surname"					 =>	"",
			"work_title"				 =>	"",
			"objective"					 =>	"",
			"brief"						 =>	"",
			"responsibilities"			 =>	"[]"
		];
		
		foreach ($keys as $key => $value) {
			
			Detail::updateOrCreate([
				"key"					 =>	$key
			], [
				"key"					 =>	$key,
				"value"					 =>	$value
			]);
			
		}
		
	}
	
}
