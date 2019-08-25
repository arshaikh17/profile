<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Expenses\Amount;

class CreateExpensesAmountsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("expenses_amounts", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->integer("key");
			$table->string("value");
			$table->timestamps();
		});
		
		foreach (Amount::getTypes() as $typeKey => $typeValue) {
			
			Amount::updateOrCreate([
				"key"					 =>	$typeKey
			], [
				"key"					 =>	$typeKey,
				"value"					 =>	$typeValue,
			]);
			
		}
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::dropIfExists("expenses_amounts");
		
	}
	
}
