<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePaidOnColumnInBillsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table("expenses_bills", function(Blueprint $table) {
			
			$table->dropColumn("paid_on");
			
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table("expenses_bills", function(Blueprint $table) {
			
			$table->datetime("paid_on");
			
		});
		
	}
	
}
