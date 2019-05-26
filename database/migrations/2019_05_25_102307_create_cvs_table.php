<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCvsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create("cvs", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("title")->nullable(false);
			$table->string("cv")->nullable(false);
			$table->tinyInteger("is_main")->nullable(false);
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
		Schema::dropIfExists("cvs");
	}
	
}
