<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\AbstractModel;

class Phone extends AbstractModel {
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"title",
		"phone",
		"is_primary"
	];
	
	/**
	 * Updates phones
	 * 
	 * @param json $data[]
	 */
	public static function savePhone($data) {
		
		Phone::updateOrCreate([
			"id"						 =>	$data->id
		], [
			"title"						 =>	$data->title,
			"phone"						 =>	$data->phone,
			"is_primary"				 =>	$data->is_primary
		]);
		
	}
	
	/**
	 * Removes Phone
	 * 
	 * @param App\Phone $phone
	 */
	public static function removePhone(Phone $phone) {
		
		$phone->delete();
		
	}
	
	/**
	 * Returns current ids associated to Phone model
	 * 
	 * @return array $ids
	 */
	public static function getCurrentIDs() {
		
		return parent::getModelIDs(Phone::all());
		
	}
	
	/**
	 * Returns primary phone
	 * 
	 * @return App\Phone $phone
	 */
	public static function getPrimaryPhone() {
		
		return Phone::where("is_primary", "=", 1)
				->first()
			?:
				Phone::first()
		;
		
	}
	
}
