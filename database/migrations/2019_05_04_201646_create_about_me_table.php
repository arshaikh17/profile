<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAboutMeTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create("about_me", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("first_name")->nullable(false)->default("");
			$table->string("surname")->nullable(false)->default("");
			$table->string("work_title")->nullable(false)->default("");
			$table->text("objective")->nullable(false)->default("");
			$table->timestamps();
		});
		
		DB::statement("INSERT INTO about_me (first_name, surname, work_title, objective) VALUES ('', '', '', '')");
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists("about_me");
		
	}
	
}
