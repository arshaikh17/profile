<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralsPersonsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("generals_persons", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("first_name")->nullable(false);
			$table->string("surname")->nullable(false);
			$table->string("owed")->nullable()->default(0);
			$table->string("lent")->nullable()->default(0);
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
		
		Schema::dropIfExists("generals_persons");
		
	}
	
}
