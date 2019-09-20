<?php

namespace App\Models\Expenses;

use Illuminate\Database\Eloquent\Model;

use App\Models\Expenses\{
	Expense
};

use DateTime;

class Bill extends Expense
{
	
	/**
	 * Fillables
	 */
	protected $fillable					 =	[
		"bill_of",
		"amount",
		"date",
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"bill",
	];
	
	/**
	 * Constants
	 */
	CONST BILL_RENT						 =	1;
	CONST BILL_MOBILE					 =	2;
	CONST BILL_INTERNET					 =	3;
	CONST BILL_NETFLIX					 =	4;
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Expenses\Bill $bill
	 * @param Array $data
	 */
	public static function saveBill(Bill $bill, $data)
	{
		
		$bill->fill($data);
		
		$bill->save();
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Expenses\Bill $bill
	 */
	public static function removeBill(Bill $bill)
	{
		
		$bill->delete();
		
	}
	
	/**
	 * Returns bill types or names
	 * 
	 * @param Array $bills
	 */
	public static function getBillNames()
	{
		
		return [
			self::BILL_RENT				 =>	"Rent",
			self::BILL_MOBILE			 =>	"Mobile",
			self::BILL_INTERNET			 =>	"Internet",
			self::BILL_NETFLIX			 =>	"Netflix",
		];
		
	}
	
	/**
	 * Get bills
	 * 
	 * @param DateTime $dateTime
	 * 
	 * @return App\Models\Expenses\Bill[]
	 */
	public static function getBills(DateTime $dateTime)
	{
		
		return Bill::whereMonthAndYear("date", "=", $dateTime)
			->orderBy("id", "DESC")
			->get()
		;
		
	}
	
	/**
	 * Counts total amount in bills by date
	 * 
	 * @param DateTime $dateTime
	 * 
	 * @return Double $totalAmount
	 */
	public static function getTotalBillsPaid(DateTime $dateTime)
	{
		
		return Bill::whereMonthAndYear("date", "=", $dateTime)
			->selectRaw("SUM(amount) as total")
			->first()
			->toArray()["total"]
		;
		
	}
	
	/* =====================================================
	 * 						ACCESSORS						
	 * ===================================================*/
	
	/**
	 * Maps "bill_of" column with types of Bills
	 * 
	 * @return String $bill
	 */
	public function getBillAttribute()
	{
		
		return self::getBillNames()[$this->bill_of] ?? "";
		
	}
	
}
