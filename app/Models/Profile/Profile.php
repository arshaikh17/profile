<?php

/**
 * This model provides mean to access other related models.
 * Eliminates need to go through every other model individually
 */

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

use App\Models\Profile\Address;
use App\Models\Profile\CV;
use App\Models\Profile\Detail;
use App\Models\Profile\Education;
use App\Models\Profile\Email;
use App\Models\Profile\Experience;
use App\Models\Profile\Gallery;
use App\Models\Profile\Phone;
use App\Models\Profile\Project;
use App\Models\Profile\Skill;
use App\Models\Profile\SocialMedia;

class Profile extends Model
{
	
	/* =====================================================
	 * 						MODEL MAPPERS					
	 * ===================================================*/
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\Address
	 */
	public function addresses()
	{
		
		return new Address;
		
	}
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\CV
	 */
	public function cvs()
	{
		
		return new CV;
		
	}
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\Detail
	 */
	public function details()
	{
		
		return new Detail;
		
	}
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\Education
	 */
	public function educations()
	{
		
		return new Education;
		
	}
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\Email
	 */
	public function emails()
	{
		
		return new Email;
		
	}
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\Experience
	 */
	public function experiences()
	{
		
		return new Experience;
		
	}
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\Gallery
	 */
	public function galleries()
	{
		
		return new Gallery;
		
	}
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\Phone
	 */
	public function phones()
	{
		
		return new Phone;
		
	}
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\Project
	 */
	public function projects()
	{
		
		return new Project;
		
	}
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\Skill
	 */
	public function skills()
	{
		
		return new Skill;
		
	}
	
	/**
	 * Returns model object
	 * 
	 * @return App\Models\Comics\SocialMedia
	 */
	public function socialMedias()
	{
		
		return new SocialMedia;
		
	}
	
}
