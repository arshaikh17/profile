<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Investments\Investment;

class CreateInvestmentsInvestmentsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("investments_investments", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("amount")->nullable(false);
			$table->integer("return_type")->nullable(false)->default(Investment::RETURN_TYPE_MONTHLY)->index();
			$table->string("roi_percentage")->nullable(false)->default(0);
			$table->integer("type")->nullable(false);
			$table->string("type_category")->nullable();
			$table->integer("currency_id")->nullable(false)->index();
			$table->integer("organisation_id")->index();
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
		
		Schema::dropIfExists("investments_investments");
		
	}
	
}
