<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ModelTypeScope;

use App\Models\Generals\Person;

use DateTime;

trait ExpensesPaymentsTrait
{
	
	/**
	 * Table
	 */
	protected $tableName				 =	"expenses_payments";
	
	/**
	 * Fillable
	 */
	protected $fillableColumns			 =	[
		"amount",
		"payment_type",
		"description",
		"date",
		"is_paid",
		"person_id",
	];
	
	/**
	 * Applies global scope
	 */
	protected static function boot()
	{
		
		parent::boot();
		
		static::addGlobalScope(new ModelTypeScope("payment_type"));
		
		static::creating(function($asset) {
			
			$asset->setAttribute("payment_type", $asset->getModelType());
			
		});
		
	}
	
	/**
	 * Construct
	 */
	public function __construct()
	{
		
		self::boot();
		$this->setTable($this->tableName);
		$this->fillable($this->fillableColumns);
		
	}
	
	/**
	 * Return payment type of model
	 * 
	 * @return Integer $model_type
	 */
	public function getModelType()
	{
		
		return $this->model_type;
		
	}
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Expenses\Owe|Lend $payment
	 * @param Array $data
	 */
	public static function savePayment($payment, $data)
	{
		
		$payment->fill($data);
		
		$payment->person()->associate($data["person"]);
		
		$payment->save();
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Owe|Lend $payment
	 */
	public static function removePayment($payment)
	{
		
		$payment->delete();
		
	}
	
	/**
	 * Gets payments
	 * 
	 * @param App\Models\Expenses\Owe|Lend $payment
	 * @param DateTime $dateTime
	 * 
	 * @return App\Models\Expenses\Owe|Lend[]
	 */
	public static function getPayments($payment, DateTime $dateTime)
	{
		
		return $payment->whereMonthAndYear("date", "=", $dateTime)
			->orderBy("id", "DESC")
			->get()
		;
		
	}
	
	/**
	 * Update paid status
	 * 
	 * @param App\Models\Expenses\Owe|Lend $payment
	 * @param Integer $status
	 */
	public static function updateStatus($payment, $status)
	{
		
		$payment->update([
			"is_paid"					 =>	$status
		]);
		
	}
	
	/* =====================================================
	 * 							RELATIONS					
	 * ===================================================*/
	
	/**
	 * Returns person associated to payment
	 * 
	 * @return App\Models\Generals\Person
	 */
	public function person()
	{
		
		return $this->belongsTo(Person::class, "person_id", "id");
		
	}
	
}