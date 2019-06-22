<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicsAuthorsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("comics_authors", function (Blueprint $table)
		{
			
			$table->bigIncrements("id");
			$table->string("first_name")->nullable(false)->default("");
			$table->string("surname")->nullable(false)->default("");
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
		
		Schema::dropIfExists("comics_authors");
		
	}
	
}
