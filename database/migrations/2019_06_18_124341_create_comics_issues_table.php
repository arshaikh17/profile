<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicsIssuesTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("comics_issues", function (Blueprint $table)
		{
			
			$table->bigIncrements("id");
			$table->string("title")->nullable(false)->default("");
			$table->string("issue")->nullable(false)->default("");
			$table->string("cover")->nullable(false)->default("");
			$table->tinyInteger("owned_status")->nullable(false)->default(0);
			$table->integer("arc_id")->nullable();
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
		
		Schema::dropIfExists("comics_issues");
		
	}
	
}
