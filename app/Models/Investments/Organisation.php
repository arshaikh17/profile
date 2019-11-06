<?php

namespace App\Models\Investments;

use Illuminate\Database\Eloquent\Model;

use App\Traits\InvestmentsTrait;

class Organisation extends Model
{
	
	/**
	 * Traits
	 */
	use InvestmentsTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"name",
		"logo",
		"type_id",
	];
	
}
