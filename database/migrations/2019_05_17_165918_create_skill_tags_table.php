<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillTagsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("skill_tags", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->integer("entity_type_id")->nullable(false)->default(0);
			$table->integer("entity_id")->nullable(false)->default(0);
			$table->integer("skill_id")->nullable(false)->default(0);
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
		
		Schema::dropIfExists("skill_tags");
		
	}
	
}
