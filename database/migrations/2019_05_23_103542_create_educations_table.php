<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("educations", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("title")->nullable(false)->default("");
			$table->string("institute")->nullable(false)->default("");
			$table->string("start_date")->nullable(false)->default("");
			$table->string("end_date")->nullable()->default("");
			$table->string("city")->nullable(false)->default("");
			$table->string("country")->nullable(false)->default("");
			$table->text("description")->nullable();
			$table->json("majors")->nullable();
			$table->string("institute_logo")->nullable();
			$table->tinyInteger("is_active")->default(0);
			$table->integer("degree_type_id")->nullable(false);
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
		
		Schema::dropIfExists("educations");
		
	}
	
}
