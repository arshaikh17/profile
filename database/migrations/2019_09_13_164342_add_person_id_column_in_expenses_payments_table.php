<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonIdColumnInExpensesPaymentsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table("expenses_payments", function (Blueprint $table) {
			$table->integer("person_id")->nullable(false)->after("is_paid");
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
			$table->dropColumn("person_id");
		});
		
	}
	
}
