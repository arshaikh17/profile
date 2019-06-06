<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AbstractModel;

class Email extends AbstractModel {
	
	
	//Fillable columns
	protected $fillable					 =	[
		"title",
		"email",
		"is_primary"
	];
	
	/**
	 * Updates emails
	 * @param json $data[]
	 */
	public static function saveEmail ($data) {
		
		Email::updateOrCreate([
			"id"						 =>	$data->id
		], [
			"title"						 =>	$data->title,
			"email"						 =>	$data->email,
			"is_primary"				 =>	$data->is_primary
		]);
		
	}
	
	/**
	 * Removes Email
	 * @param App\Email $email
	 */
	public static function removeEmail (Email $email) {
		
		$email->delete();
		
	}
	
	/**
	 * Returns primary email
	 * @return App\Email $email
	 */
	public static function getPrimaryEmail() {
		
		return Email::where("is_primary", "=", 1)
				->first()
			?:
				Email::first()
		;
		
	}
	
}
