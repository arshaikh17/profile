<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusColumnInTrackerIssuesTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table("tracker_issues", function (Blueprint $table) {
			$table->integer("status")->nullable(false)->after("url");
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table("tracker_issues", function (Blueprint $table) {
			$table->dropColumn("status");
		});
		
	}
	
}
