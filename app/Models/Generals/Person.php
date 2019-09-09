<?php

namespace App\Models\Generals;

use Illuminate\Database\Eloquent\Model;

use App\Traits\GeneralsTrait;

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
		"owed",
		"lent",
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"name",
	];
	
	/* =====================================================
	 * 							MUTATORS					
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
	
}
