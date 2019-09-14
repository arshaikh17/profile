<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesPaymentsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("expenses_payments", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->tinyInteger("payment_type")->nullable(false);
			$table->string("amount")->nullable(false);
			$table->text("description");
			$table->tinyInteger("is_paid")->default(\App\Models\Expenses\Expense::PAID);
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
		
		Schema::dropIfExists("expenses_payments");
		
	}
	
}
