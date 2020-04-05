<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComicsCollectiblesTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("comics_collectibles", function (Blueprint $table) {
			
			$table->bigIncrements("id");
			$table->string("name")->nullable(false);
			$table->text("description")->nullable();
			$table->string("price")->nullable();
			$table->string("image")->nullable(false);
			$table->string("link")->nullable();
			$table->string("height")->nullable(false);
			$table->string("width")->nullable(false);
			$table->string("depth")->nullable(false);
			$table->string("order_id")->nullable();
			$table->integer("character_id")->nullable()->index();
			$table->integer("scale_id")->nullable(false)->index();
			$table->integer("bought_from_id")->nullable(false)->index();
			$table->integer("manufacturer_id")->nullable()->index();
			$table->integer("brand_id")->nullable()->index();
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
		
		Schema::dropIfExists("comics_collectibles");
		
	}
	
}
