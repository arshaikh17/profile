<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentsOrganisationsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("organisations", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("name")->nullable(false);
			$table->string("logo")->nullable();
			$table->string("type_id")->nullable();
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
		
		Schema::dropIfExists("organisations");
		
	}
	
}
