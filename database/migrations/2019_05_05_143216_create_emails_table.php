<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create("emails", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("title")->nullable()->default("");
			$table->string("email")->nullable(false)->default("");
			$table->tinyInteger("is_primary")->nullable(false)->default(0);
			$table->timestamps();
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists("emails");
		
	}
	
}
