<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentsRoisTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("investments_rois", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("amount")->nullable(false);
			$table->dateTime("paid_at")->nullable(false);
			$table->integer("investment_id")->index();
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
		
		Schema::dropIfExists("investments_rois");
		
	}
	
}
