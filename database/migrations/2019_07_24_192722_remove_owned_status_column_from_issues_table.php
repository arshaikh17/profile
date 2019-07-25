<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveOwnedStatusColumnFromIssuesTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table("comics_issues", function (Blueprint $table) {
			
			$table->dropColumn("owned_status");
			
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table("comics_issues", function (Blueprint $table) {
			
			$table->tinyInteger("owned_status")->default(0);
			
		});
		
	}
	
}
