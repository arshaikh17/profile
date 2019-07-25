<?php

namespace Comics;

use Illuminate\Database\Seeder;

use App\Models\Comics\Issue;

class UpdateIssuesWishlistSeeder extends Seeder
{
	
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		
		Issue::where("owned_status", "=", 2)
			->update([
				"is_wishlist"			 =>	Issue::STATUS_WISHLIST
			])
		;
		
	}
	
}
