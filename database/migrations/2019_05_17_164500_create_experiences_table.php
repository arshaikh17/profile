<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperiencesTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("experiences", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("company")->nullable(false)->default("");
			$table->string("title")->nullable(false)->default("");
			$table->text("description")->nullable();
			$table->json("responsibilities")->nullable();
			$table->string("city")->nullable(false)->default("");
			$table->string("country")->nullable(false)->default("");
			$table->integer("start_date")->nullable(false)->default(0);
			$table->integer("end_date")->nullable()->default(0);
			$table->string("company_logo")->nullable();
			$table->tinyInteger("is_active")->default(0);
			$table->integer("job_type_id")->nullable(false)->default(0);
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
		
		Schema::dropIfExists("experiences");
		
	}
	
}
