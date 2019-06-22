<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicsSeriesTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("comics_series", function (Blueprint $table)
		{
			
			$table->bigIncrements("id");
			$table->string("title")->nullable(false)->default("");
			$table->tinyInteger("is_completed")->nullable(false)->default(0);
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
		
		Schema::dropIfExists("comics_series");
		
	}
	
}
