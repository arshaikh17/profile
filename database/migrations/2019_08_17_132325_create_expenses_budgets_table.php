<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesBudgetsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("expenses_budgets", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("title")->nullable(false);
			$table->text("description");
			$table->string("amount")->nullable(false);
			$table->datetime("date")->nullable(false);
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
		
		Schema::dropIfExists("expenses_budgets");
		
	}
	
}
