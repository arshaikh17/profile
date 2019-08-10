<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveIsCompletedFromArcsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table("comics_arcs", function (Blueprint $table) {
			
			$table->dropColumn("is_completed");
			
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table("comics_arcs", function (Blueprint $table) {
			
			$table->tinyInteger("is_completed")->nullable(false)->default(0);
			
		});
		
	}
	
}
