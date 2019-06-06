<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\AboutMe;

class AboutMe extends Model
{
	
	/**
	 * Table name
	 */
	protected $table					 =	"about_me";
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"first_name",
		"surname",
		"work_title",
		"objective",
		"brief",
		"responsibilities",
		"profile_picture"
	];
	
	/**
	 * Casts
	 */
	protected $casts					 =	[
		"responsibilities"				 =>	"array"
	];
	
	/**
	 * Scoped Variables
	 */
	protected static $path_profile		 =	"/uploads/profile/";
	
	/**
	 * Returns active about me record
	 * 
	 * @return AboutMe $about
	 */
	public static function getAboutMe()
	{
		
		return AboutMe::find(1);
		
	}
	
	/**
	 * Updates About me
	 * 
	 * @param json $data[]
	 */
	public static function saveAboutMe($data)
	{
		
		$profile_picture				 =	self::getAboutMe()->profile_picture;
		
		if ($data->hasFile("profile_picture")) {
			
			$image						 =	$data->file("profile_picture");
			$profile_picture			 =	time() . "." . $image->getClientOriginalName();
			
			$image->move(public_path() . self::$path_profile, $profile_picture);
			
		}
		
		AboutMe::where("id", "=", 1)
			->update([
				"first_name"			 =>	$data->first_name,
				"surname"				 =>	$data->surname,
				"work_title"			 =>	$data->work_title,
				"objective"				 =>	$data->objective,
				"brief"					 =>	$data->brief,
				"responsibilities"		 =>	json_encode($data->responsibilities) ?? [],
				"profile_picture"		 =>	$profile_picture,
			])
		;
		
	}
	
}
