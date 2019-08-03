<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

use App\Models\Profile\AbstractModel;

use App\Traits\ProfileTrait;

class Phone extends AbstractModel
{
	
	use ProfileTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"title",
		"phone",
		"is_primary"
	];
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param json $data[]
	 */
	public static function savePhone($data)
	{
		
		Phone::updateOrCreate([
			"id"						 =>	$data->id
		], [
			"title"						 =>	$data->title,
			"phone"						 =>	$data->phone,
			"is_primary"				 =>	$data->is_primary
		]);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Profile\Phone $phone
	 */
	public static function removePhone(Phone $phone)
	{
		
		$phone->delete();
		
	}
	
	/**
	 * Returns current ids associated to model
	 * 
	 * @return array $ids[]
	 */
	public static function getCurrentIDs()
	{
		
		return (new self)->getModelIDs(Phone::all());
		
	}
	
	/**
	 * Returns primary recrd
	 * 
	 * @return App\Models\Profile\Phone $phone
	 */
	public static function getPrimaryPhone()
	{
		
		return Phone::where("is_primary", "=", 1)
				->first()
			?:
				Phone::first() ?: new Phone
		;
		
	}
	
}
