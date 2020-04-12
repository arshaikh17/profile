<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSymbolInComicsCharactersTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table("comics_characters", function (Blueprint $table) {
			
			$table->string("symbol")->nullable();
			
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table("comics_characters", function (Blueprint $table) {
			
			$table->dropColumn("symbol");
			
		});
		
	}
	
}
