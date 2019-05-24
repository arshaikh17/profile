<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("projects", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("title")->nullable(false)->default("");
			$table->text("description")->nullable();
			$table->string("link")->nullable();
			$table->string("repository")->nullable();
			$table->json("responsibilities")->nullable();
			$table->string("cover")->nullable(false);
			$table->integer("company_id")->nullable();
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
		
		Schema::dropIfExists("projects");
		
	}
	
}
