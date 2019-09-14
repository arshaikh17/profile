<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameOwedColumnToDebtColumnInGeneralsPersonsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::table("generals_persons", function (Blueprint $table) {
			$table->renameColumn("owed", "debt");
		});
		
	}
	
	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		Schema::table("generals_persons", function (Blueprint $table) {
			$table->renameColumn("debt", "owed");
		});
		
	}
	
}
