<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicsIssuesAuthorsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("comics_issues_authors", function (Blueprint $table)
		{
			
			$table->integer("issue_id")->nullable(false);
			$table->integer("author_id")->nullable(false);
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
		
		Schema::dropIfExists("comics_issues_authors");
		
	}
	
}
