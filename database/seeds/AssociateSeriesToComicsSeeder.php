<?php

use Illuminate\Database\Seeder;

use App\Models\Comics\Issue;

class AssociateSeriesToComicsSeeder extends Seeder
{
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		foreach (Issue::all() as $issue) {
			
			if (!$issue->arc) continue;
			
			$issue->series()->associate($issue->arc->series);
			$issue->save();
			
		}
		
	}
	
}
