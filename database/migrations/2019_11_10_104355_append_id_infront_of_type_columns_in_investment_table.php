<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AppendIdInfrontOfTypeColumnsInInvestmentTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table("investments_investments", function (Blueprint $table) {
			$table->renameColumn("return_type", "return_type_id");
			$table->renameColumn("type", "type_id");
		});
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table("investments_investments", function (Blueprint $table) {
			$table->renameColumn("return_type_id", "return_type");
			$table->renameColumn("type_id", "type");
		});
	}
	
}
