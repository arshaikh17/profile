<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;
use App\Models\Profile\AbstractModel;

use App\Traits\ProfileTrait;

class Education extends AbstractModel
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
		"institute",
		"start_date",
		"end_date",
		"city",
		"country",
		"institute_logo",
		"description",
		"majors",
		"is_active",
		"degree_type_id",
	];
	
	/**
	 * Casts
	 */
	protected $casts					 =	[
		"majors"						 =>	"array"
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"degree_type",
		"degree_acronym"
	];
	
	/**
	 * Constants
	 */
	CONST DEGREE_TYPE_SCHOOL			 =	1;
	CONST DEGREE_TYPE_COLLEGE			 =	2;
	CONST DEGREE_TYPE_BACHELORS			 =	3;
	CONST DEGREE_TYPE_MASTERS			 =	4;
	
	/**
	 * Scoped variables
	 */
	private static $path_logo			 =	"/uploads/profile/educations/";
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Returns Degree types
	 * 
	 * @return array $degrees[]
	 */
	public static function getDegreeTypes()
	{
		
		return [
			self::DEGREE_TYPE_SCHOOL	 =>	"School Degree",
			self::DEGREE_TYPE_COLLEGE	 =>	"College Degree",
			self::DEGREE_TYPE_BACHELORS	 =>	"Bachelor's Degree",
			self::DEGREE_TYPE_MASTERS	 =>	"Master's Degree"
		];
		
	}
	
	/**
	 * Returns Degree acronyms
	 * 
	 * @return array $acronyms[]
	 */
	public static function getDegreeAcronyms()
	{
		
		return [
			self::DEGREE_TYPE_SCHOOL	 =>	"School",
			self::DEGREE_TYPE_COLLEGE	 =>	"College",
			self::DEGREE_TYPE_BACHELORS	 =>	"BSc",
			self::DEGREE_TYPE_MASTERS	 =>	"MSc"
		];
		
	}
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Profile\Education $education
	 * @param json $data[]
	 */
	public static function saveEducation(Education $education, $data)
	{
		
		$institute_logo					 =	$education->institute_logo;
		
		if ($data->hasFile("institute_logo")) {
			
			$file						 =	$data->file("institute_logo");
			
			//if (file_exists(public_path() . self::$path_logo . $education->institute_logo)) var_dump(unlink(public_path() . self::$path_logo . "$education->institute_logo"));
			
			$institute_logo				 =	time() . "." . $file->getClientOriginalName();
			
			$file->move(public_path() . self::$path_logo, $institute_logo);
			
		}
		
		$education						 =	Education::updateOrCreate([
			"id"						 =>	$data->id
		], [
			"title"						 =>	$data->title,
			"degree"					 =>	$data->degree,
			"institute"					 =>	$data->institute,
			"start_date"				 =>	$data->start_date,
			"end_date"					 =>	$data->end_date,
			"city"						 =>	$data->city,
			"country"					 =>	$data->country,
			"institute_logo"			 =>	$institute_logo,
			"description"				 =>	$data->description,
			"majors"					 =>	$data->majors,
			"is_active"					 =>	$data->is_active ?: 0,
			"degree_type_id"			 =>	$data->degree_type_id
		]);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Profile\Education $education
	 */
	public static function removeEducation(Education $education)
	{
		
		$education->delete();
		
	}
	
	/**
	 * Returns current ids associated to model
	 * 
	 * @return array $ids[]
	 */
	public static function getCurrentIDs()
	{
		
		return (new self)->getModelIDs(Education::all());
		
	}
	
	/* =====================================================
	 * 						MUTATORS						
	 * ===================================================*/
	
	/**
	 * Returns degree type
	 * 
	 * @return String $degreeType
	 */
	public function getDegreeTypeAttribute()
	{
		
		return self::getDegreeTypes()[$this->degree_type_id] ?? "";
		
	}
	
	/**
	 * Returns degree acronym
	 * 
	 * @return String $degreeAcronym
	 */
	public function getDegreeAcronymAttribute()
	{
		
		return self::getDegreeAcronyms()[$this->degree_type_id] ?? "";
		
	}
	
}
