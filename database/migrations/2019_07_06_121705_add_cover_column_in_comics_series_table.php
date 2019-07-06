<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCoverColumnInComicsSeriesTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table("comics_series", function (Blueprint $table) {
			
			$table->string("cover")->nullable(true);
			
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table("comics_series", function (Blueprint $table) {
			
			$table->dropColumn("cover");
			
		});
		
	}
	
}
