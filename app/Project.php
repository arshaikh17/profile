<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\SkillTag;
use App\Gallery;

class Project extends Model
{
	
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
	 * Variable for scope
	 */
	private static $path_cover			 =	"/uploads/project_cover/";
	private static $path_gallery		 =	"/uploads/gallery/";
	
	/**
	 * Updates project
	 * @param App\Project $project
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
	 * Removes Project
	 * @param App\Project $project
	 */
	public static function removeProject(Project $project)
	{
		
		$project->delete();
		
	}
	
	/**
	 * Returns current Project ids
	 * @return array $ids
	 */
	public static function getCurrentIDs()
	{
		
		$ids							 =	[];
		
		foreach (Project::all() as $project) {
			
			$ids[]						 =	$project->id;
			
		}
		
		return $ids;
		
	}
	
	/* =====================================================
	 * 						MUTATORS						
	 * ===================================================*/
	
	/* =====================================================
	 * 						RELATIONS						
	 * ===================================================*/
	
	/**
	 * Returns skills associated to a project
	 * @return Array $skilltags[]
	 */
	public function skill_tags()
	{
		
		return $this->hasMany(SkillTag::class, "entity_id", "id")
			->where("entity_type_id", SkillTag::ENTITY_PROJECT)
		;
		
	}
	
	/**
	 * Returns experience associated to a project
	 * @return Array $experience[]
	 */
	public function experience()
	{
		
		return $this->belongsTo(Exerience::class, "id", "company_id");
		
	}
	
	/**
	 * Returns gallery images associated to a project
	 * @return Array $images[]
	 */
	public function gallery()
	{
		
		return $this->hasMany(Gallery::class, "entity_id", "id")
			->where("entity_type_id", Gallery::ENTITY_PROJECT)
		;
		
	}
	
}
