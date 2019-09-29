<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackerIssuesTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("tracker_issues", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("title")->nullable(false);
			$table->text("description");
			$table->string("url")->nullable();
			$table->integer("module_id")->nullable(false);
			$table->timestamps();
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::dropIfExists("tracker_issues");
		
	}
	
}
