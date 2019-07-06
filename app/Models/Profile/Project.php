<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

use App\Models\Profile\AbstractModel;
use App\Models\Profile\SkillTag;
use App\Models\Profile\Gallery;

use App\Traits\ModelTrait;

class Project extends AbstractModel
{
	
	use ModelTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"title",
		"description",
		"link",
		"repository",
		"responsibilities",
		"cover",
		"company_id"
	];
	
	/**
	 * Casts
	 */
	protected $casts					 =	[
		"responsibilities"				 =>	"array"
	];
	
	/**
	 * Scoped variables
	 */
	private static $path_cover			 =	"/uploads/profile/project_covers/";
	private static $path_gallery		 =	"/uploads/profile/galleries/";
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param App\Models\Profile\Project $project
	 * @param json $data[]
	 */
	public static function saveProject(Project $project, $data)
	{
		
		$cover							 =	$project->cover;
		
		if ($data->hasFile("cover")) {
			
			$file						 =	$data->file("cover");
			
			//if (file_exists(public_path() . self::$path_logo . $project->cover)) var_dump(unlink(public_path() . self::$path_cover . $project->cover));
			
			$cover						 =	time() . "." . $file->getClientOriginalName();
			
			$file->move(public_path() . self::$path_cover, $cover);
			
		}
		
		$project						 =	Project::updateOrCreate([
			"id"						 =>	$data->id
		], [
			"title"						 =>	$data->title,
			"description"				 =>	$data->description,
			"link"						 =>	$data->link,
			"repository"				 =>	$data->repository,
			"responsibilities"			 =>	$data->responsibilities,
			"cover"						 =>	$cover,
			"company_id"				 =>	$data->company_id
		]);
		
		$skillTags						 =	SkillTag::getCurrentIDs(SkillTag::ENTITY_PROJECT, $project->id);
		$newSkillTags					 =	$data->existing_skill_tags ?? [];
		
		$skillTagsDifference			 =	array_diff($skillTags, $newSkillTags);
		
		foreach ($skillTagsDifference as $skillTagDifferenceId) {
			
			SkillTag::removeSkillTag(SkillTag::find($skillTagDifferenceId));
			
		}
		
		foreach ($data->skill_tags as $tag) {
			
			SkillTag::saveSkillTag([
				"skill_id"				 =>	$tag,
				"entity_type_id"		 =>	SkillTag::ENTITY_PROJECT,
				"entity_id"				 =>	$project->id
			]);
			
		}
		
		$galleryIds						 =	Gallery::getCurrentIDs(Gallery::ENTITY_PROJECT, $project->id);
		$newGalleryIds					 =	$data->existing_gallery_ids ?? [];
		
		$galleryDifference				 =	array_diff($galleryIds, $newGalleryIds);
		
		foreach ($galleryDifference as $galleryDifferenceId) {
			
			Gallery::removeGallery(Gallery::find($galleryDifferenceId));
			
		}
		
		$galleryTitles					 =	$data->gallery_titles;
		$galleryImages					 =	$data->gallery_images;
		$galleryImageNames				 =	$data->gallery_image_names;
		
		foreach ($galleryTitles as $galleryKey => $galleryTitle) {
			
			Gallery::saveGallery($galleryImages[$galleryKey] ?? null, [
				"id"					 =>	$newGalleryIds[$galleryKey] ?? null,
				"title"					 =>	$galleryTitle,
				"entity_type_id"		 =>	Gallery::ENTITY_PROJECT,
				"entity_id"				 =>	$project->id,
				"gallery_image_name"	 =>	$galleryImageNames[$galleryKey] ?? null,
			]);
			
		}
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Profile\Project $project
	 */
	public static function removeProject(Project $project)
	{
		
		$project->delete();
		
	}
	
	/**
	 * Returns current ids associated to model
	 * 
	 * @return array $ids[]
	 */
	public static function getCurrentIDs()
	{
		
		return (new self)->getModelIDs(Project::all());
		
	}
	
	/* =====================================================
	 * 						MUTATORS						
	 * ===================================================*/
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns skills associated to a project
	 * 
	 * @return App\Models\Profile\SkillTag $skillTags[]
	 */
	public function skill_tags()
	{
		
		return $this->hasMany(SkillTag::class, "entity_id", "id")
			->where("entity_type_id", SkillTag::ENTITY_PROJECT)
		;
		
	}
	
	/**
	 * Returns experience associated to a project
	 * 
	 * @return App\Models\Profile\Experience $experience
	 */
	public function experience()
	{
		
		return $this->belongsTo(Exerience::class, "id", "company_id");
		
	}
	
	/**
	 * Returns gallery images associated to a project
	 * 
	 * @return App\Models\Profile\Gallery $images[]
	 */
	public function gallery()
	{
		
		return $this->hasMany(Gallery::class, "entity_id", "id")
			->where("entity_type_id", Gallery::ENTITY_PROJECT)
		;
		
	}
	
}
