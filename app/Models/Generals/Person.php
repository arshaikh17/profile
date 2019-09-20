<?php

namespace App\Models\Generals;

use Illuminate\Database\Eloquent\Model;

use App\Traits\GeneralsTrait;

use App\Models\Expenses\Payments\{
	DebtReturn,
	DebtTaken
};

class Person extends Model
{
	
	/**
	 * Table
	 * 
	 * @comment Not sure why laravel picking old table name
	 */
	protected $table = "generals_persons";
	
	/**
	 * Traits
	 */
	use GeneralsTrait;
	
	/**
	 * Fillables
	 */
	protected $fillable					 =	[
		"first_name",
		"surname",
		"email",
		"debt",
		"lent",
		"password",
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"name",
	];
	
	/**
	 * Hiddens
	 */
	protected $hidden					 =	[
		"password",
	];
	
	/**
	 * Constants
	 */
	CONST AMOUNT_DEBT					 =	1;
	CONST AMOUNT_LEND					 =	2;
	
	/* =====================================================
	 * 							ACCESSORS					
	 * ===================================================*/
	
	/**
	 * Returns first_name and surname concatenated
	 * 
	 * @return String $name
	 */
	public function getNameAttribute()
	{
		
		return "{$this->first_name} {$this->surname}";
		
	}
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\General\Person $person
	 * @param Array $data
	 */
	public static function savePerson(Person $person, $data)
	{
		
		$person->fill($data);
		
		$person->save();
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\General\Person $person
	 */
	public static function removePerson(Person $person)
	{
		
		$person->delete();
		
	}
	
	/**
	 * Finds by email
	 * 
	 * @param String $email
	 * 
	 * @return App\Models\Generals\Person|null
	 */
	public static function findByEmail($email)
	{
		
		return self::where("email", "=", $email)->first();
		
	}
	
	/* =====================================================
	 * 					RELATIONAL METHODs					
	 * ===================================================*/
	
	/**
	 * Returns column associated to the amount
	 * 
	 * @param Integer $type
	 * 
	 * @return String $column
	 */
	private function getAmountColumn($type)
	{
		
		switch ($type) {
			
			case self::AMOUNT_DEBT:
				
				$column					 =	"debt";
				
				break;
				
			case self::AMOUNT_LEND;
				
				$column					 =	"lend";
				
			default:
				
				break;
				
		}
		
		return $column;
		
	}
	
	/**
	 * Adds amount
	 * 
	 * @param Integer $type
	 * @param Double $amount
	 */
	public function addAmount($type, $amount)
	{
		
		$column							 =	$this->getAmountColumn($type);
		$totalAmount					 =	$this->$column + $amount;
		
		self::savePerson($this, [$column => $totalAmount]);
		
	}
	
	/**
	 * Deducts amount
	 * 
	 * @param Integer $type
	 * @param Double $amount
	 */
	public function deductAmount($type, $amount)
	{
		
		$column							 =	$this->getAmountColumn($type);
		$totalAmount					 =	$this->$column - $amount;
		
		self::savePerson($this, [$column => $totalAmount]);
		
	}
	
	/* =====================================================
	 * 							RELATIONS					
	 * ===================================================*/
	
	/**
	 * Return debts that have been returned to the person
	 * 
	 * @param String $orderBy
	 * 
	 * @return App\Models\Expenses\DebtReturn[]
	 */
	public function debtReturns($orderBy = false)
	{
		
		$debtReturns					 =	$this->hasMany(DebtReturn::class, "person_id", "id");
		
		return $orderBy ? $debtReturns->orderBy("id", $orderBy)->get() : $debtReturns;
		
	}
	
	/**
	 * Return debts that have been taken to the person
	 * 
	 * @param String $orderBy
	 * 
	 * @return App\Models\Expenses\DebtTaken[]
	 */
	public function debtTakens($orderBy = false)
	{
		
		$debtTakens						 =	$this->hasMany(DebtTaken::class, "person_id", "id");
		
		return $orderBy ? $debtTakens->orderBy("id", $orderBy)->get() : $debtTakens;
		
	}
	
}
