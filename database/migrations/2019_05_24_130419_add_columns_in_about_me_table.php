<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsInAboutMeTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table("about_me", function (Blueprint $table) {
			$table->text("brief")->nullable();
			$table->string("profile_picture")->nullable();
			$table->json("responsibilities")->nullable();
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table("about_me", function (Blueprint $table) {
			$table->dropColumn("brief");
			$table->dropColumn("profile_picture");
			$table->dropColumn("responsibilities");
		});
		
	}
	
}
