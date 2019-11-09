<?php

namespace App\Models\Investments;

use Illuminate\Database\Eloquent\Model;

use App\Traits\InvestmentsTrait;

use App\Models\Investments\Investment;

class ROI extends Model
{
	
	/**
	 * Traits
	 */
	use InvestmentsTrait;
	
	/**
	 * Fillable
	 */
	protected $fillable					 =	[
		"amount",
		"paid_at",
		"investment_id",
	];
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns investment it associates to
	 * 
	 * @return App\Models\Investments\Investment
	 */
	public function investment()
	{
		
		return $this->belongsTo(Investment::class, "investment_id", "id");
		
	}
	
}
