<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Expenses\Expenditure;

class AddExpenditureTypeColumnInExpensesExpendituresTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table("expenses_expenditures", function (Blueprint $table) {
			$table->tinyInteger("is_paid")->default(Expenditure::PAID)->after("description");
			$table->integer("expenditure_type")->default((new Expenditure)->getModelType())->after("is_paid");
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table("expenses_expenditures", function (Blueprint $table) {
			$table->dropColumn("is_paid");
			$table->dropColumn("expenditure_type");
		});
		
	}
	
}
