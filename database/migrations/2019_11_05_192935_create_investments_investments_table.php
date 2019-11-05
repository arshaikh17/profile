<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Models\Investments\Return;

class CreateInvestmentsInvestmentsTable extends Migration
{
	
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		Schema::create("investments", function (Blueprint $table) {
			$table->bigIncrements("id");
			$table->string("amount")->nullable(false);
			$table->integer("currency_id")->nullable(false)->index();
			$table->integer("return_type")->nullable(false)->default(Return::TYPE_MONTHLY)->index();
			$table->string("roi")->nullable(false)->default(0);
			$table->integer("type")->nullable(false);
			$table->string("type_category")->nullable();
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
		
		Schema::dropIfExists("investments");
		
	}
	
}
