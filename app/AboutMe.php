<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\AboutMe;

class AboutMe extends Model {
	
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
		"objective"
	];
	
	/**
	 * Returns active about me record
	 * @return AboutMe $about
	 */
	public static function getAboutMe () {
		
		return AboutMe::find(1);
		
	}
	
	/**
	 * Updates About me
	 * @param json $data[]
	 */
	public static function saveAboutMe ($data) {
		
		AboutMe::where("id", "=", 1)
			->update([
				"first_name"			 =>	$data->first_name,
				"surname"				 =>	$data->surname,
				"work_title"			 =>	$data->work_title,
				"objective"				 =>	$data->objective
			])
		;
		
	}
	
}
