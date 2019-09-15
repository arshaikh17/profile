<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailColumnInGeneralsPersonsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table("generals_persons", function (Blueprint $table) {
			$table->string("email")->nullable()->unique();
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table("generals_persons", function (Blueprint $table) {
			$table->dropColumn("email");
		});
		
	}
	
}
