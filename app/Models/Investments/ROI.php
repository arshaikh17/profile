<?php

namespace App\Models\Investments;

use Illuminate\Database\Eloquent\Model;

use App\Traits\InvestmentsTrait;

class ROI extends Model
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
		"paid_at",
		"investment_id",
	];
	
}
