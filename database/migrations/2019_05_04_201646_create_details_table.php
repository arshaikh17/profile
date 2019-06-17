<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create("details", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("key")->nullable(false)->default("");
			$table->text("value")->nullable(false);
			$table->timestamps();
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists("details");
		
	}
	
}
