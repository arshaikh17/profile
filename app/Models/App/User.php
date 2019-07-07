<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Models\Comics\Comics;
use App\Models\Comics\Profile;

class User extends Authenticatable
{
	
	use Notifiable;
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable					 =	[
		"name",
		"email",
		"password",
	];
	
	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden					 =	[
		"password",
		"remember_token",
	];
	
	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts					 =	[
		"email_verified_at"				 =>	"datetime",
	];
	
	/* =====================================================
	 * 						MODEL MAPPERS					
	 * ===================================================*/
	
	/**
	 * Returns comics object
	 * 
	 * @return App\Models\Comics\Comics $comics
	 */
	public function comics()
	{
		
		return new Comics;
		
	}
	
	/**
	 * Returns profile object
	 * 
	 * @return App\Models\Comics\Profile $profile
	 */
	public function profile()
	{
		
		return new Profile;
		
	}
	
}
