<?php

namespace App\Models\Investments;

use Illuminate\Database\Eloquent\Model;

use App\Traits\InvestmentsTrait;

class Investment extends Model
{
	
	/**
	 * Traits
	 */
	use InvestmentsTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"amount",
		"return_type",
		"roi_percentage",
		"type",
		"type_category",
		"currency_id",
		"organisation_id",
	];
	
	/**
	 * Constants
	 */
	CONST TYPE_MONTHLY					 =	1;
	
}
