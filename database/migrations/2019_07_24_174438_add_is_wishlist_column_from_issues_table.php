<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsWishlistColumnFromIssuesTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table("comics_issues", function (Blueprint $table) {
			
			$table->tinyInteger("is_wishlist")->default(0);
			
		});
		
		(new Comics\UpdateIssuesWishlistSeeder)->run();
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table("comics_issues", function (Blueprint $table) {
			
			$table->dropColumn("is_wishlist");
			
		});
		
	}
}
