<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleriesTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("galleries", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("title")->nullable(false)->default("");
			$table->text("image")->nullable(false)->default("");
			$table->integer("entity_type_id")->nullable(false);
			$table->integer("entity_id")->nullable(false);
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
		
		Schema::dropIfExists("galleries");
		
	}
	
}
