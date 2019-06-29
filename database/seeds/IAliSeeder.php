<?php

use Illuminate\Database\Seeder;

use App\User;

class IAliSeeder extends Seeder
{
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		$details						 =	[
			"name"						 =>	"Ali Rasheed",
			"email"						 =>	"arshaikh_17@hotmail.com",
			"password"					 =>	bcrypt(time())
		];
		
		User::updateOrCreate([
			"email"						 =>	$details["email"]
		], $details);
		
	}
	
}
