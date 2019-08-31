<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesGoalsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("expenses_goals", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("amount")->nullable(false);
			$table->integer("goal_type")->nullable(false);
			$table->text("description");
			$table->datetime("date")->nullable(false);
			$table->tinyInteger("status")->nullable(1);
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
		
		Schema::dropIfExists("expenses_goals");
		
	}
	
}
