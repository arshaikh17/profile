<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;
use App\Models\Profile\AbstractModel;

use App\Traits\ProfileTrait;

class Address extends AbstractModel
{
	
	/**
	 * Traits
	 */
	use ProfileTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"title",
		"address",
		"city",
		"state",
		"country",
		"postcode",
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
	public static function saveAddress($data)
	{
		
		Address::updateOrCreate([
			"id"						 =>	$data->id
		], [
			"title"						 =>	$data->title,
			"address"					 =>	$data->address,
			"city"						 =>	$data->city,
			"state"						 =>	$data->state,
			"country"					 =>	$data->country,
			"postcode"					 =>	$data->postcode,
			"is_primary"				 =>	$data->is_primary
		]);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Profile\Address $address
	 */
	public static function removeAddress(Address $address)
	{
		
		$address->delete();
		
	}
	
	/**
	 * Returns current ids associated to model
	 * 
	 * @return array $ids[]
	 */
	public static function getCurrentIDs()
	{
		
		return (new self)->getModelIDs(Address::all());
		
	}
	
	/**
	 * Returns primary record
	 * 
	 * @return App\Models\Profile\Address $address
	 */
	public static function getPrimaryAddress()
	{
		
		return Address::where("is_primary", "=", 1)
				->first()
			?:
				Address::first() ?: new Address
		;
		
	}
	
}
