<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {
		
	//Fillable columns
	protected $fillable					 =	[
		"title",
		"address",
		"city",
		"state",
		"country",
		"postcode",
		"is_primary"
	];
	
	/**
	 * Updates addresses
	 * @param json $data[]
	 */
	public static function saveAddress ($data) {
		
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
	 * Removes Address
	 * @param App\Address $address
	 */
	public static function removeAddress (Address $address) {
		
		$address->delete();
		
	}
	
	/**
	 * Returns current Address ids
	 * @return array $ids
	 */
	public static function getCurrentIDs () {
		
		$ids							 =	[];
		
		foreach (Address::all() as $address) {
			
			$ids[]						 =	$address->id;
			
		}
		
		return $ids;
		
	}
	
	/**
	 * Returns primary address
	 * @return App\Address $address
	 */
	public static function getPrimaryAddress () {
		
		return Address::where("is_primary", "=", 1)
				->first()
			?:
				Address::first()
		;
		
	}
	
}
