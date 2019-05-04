<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialMediasTable extends Migration {
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		
		Schema::create("social_medias", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("url")->nullable(false)->default("");
			$table->string("icon")->nullable();
			$table->integer("type_id")->nullable(false);
			$table->timestamps();
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		
		Schema::dropIfExists("social_medias");
		
	}
	
}
