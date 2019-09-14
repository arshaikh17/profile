<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateColumnInExpensesPaymentsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table("expenses_payments", function (Blueprint $table) {
			$table->datetime("date")->nullable(false)->after("description");
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table("expenses_payments", function (Blueprint $table) {
			$table->dropColumn("date");
		});
		
	}
	
}
