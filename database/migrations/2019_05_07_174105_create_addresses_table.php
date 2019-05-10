<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create("addresses", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("title")->nullable()->default("");
			$table->string("address")->nullable(false)->default("");
			$table->string("city")->nullable(false)->default("");
			$table->string("state")->nullable(false)->default("");
			$table->string("country")->nullable(false)->default("");
			$table->string("postcode")->nullable(false)->default("");
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
		
		Schema::dropIfExists("addresses");
		
	}
	
}
