<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;
use App\Models\Profile\AbstractModel;

use App\Traits\ProfileTrait;

class Email extends AbstractModel
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
		"email",
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
	public static function saveEmail($data)
	{
		
		Email::updateOrCreate([
			"id"						 =>	$data->id
		], [
			"title"						 =>	$data->title,
			"email"						 =>	$data->email,
			"is_primary"				 =>	$data->is_primary
		]);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Profile\Email $email
	 */
	public static function removeEmail(Email $email)
	{
		
		$email->delete();
		
	}
	
	/**
	 * Returns current ids associated to model
	 * 
	 * @return array $ids[]
	 */
	public static function getCurrentIDs()
	{
		
		return (new self)->getModelIDs(Email::all());
		
	}
	
	/**
	 * Returns primary record
	 * 
	 * @return App\Models\Profile\Email $email
	 */
	public static function getPrimaryEmail()
	{
		
		return Email::where("is_primary", "=", 1)
				->first()
			?:
				Email::first() ?: new Email
		;
		
	}
	
}
