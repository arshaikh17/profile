<?php

namespace App\Models\Profile;

use Illuminate\Database\Eloquent\Model;

use App\Models\Profile\AbstractModel;

use App\Traits\ModelTrait;

class Gallery extends AbstractModel
{
	
	use ModelTrait;
	
	/**
	 * Fillable columns
	 */
	protected $fillable					 =	[
		"title",
		"image",
		"entity_type_id",
		"entity_id"
	];
	
	/**
	 * Scoped variables
	 */
	private static $path_gallery		 =	"/uploads/profile/galleries/";
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/**
	 * Saves record
	 * 
	 * @param File $image
	 * @param Array $data
	 */
	public static function saveGallery($image = null, Array $data)
	{
		
		$imageName						 =	$data["id"] ? $data["gallery_image_name"] : "";
		
		if (!$data["id"]) {
			
			$imageName					 =	time() . "." . $image->getClientOriginalName();
			$image->move(public_path() . self::$path_gallery, $imageName);
			
		}
		
		Gallery::updateOrCreate([
			"id"						 =>	$data["id"],
		], [
			"title"						 =>	$data["title"],
			"image"						 =>	$imageName,
			"entity_type_id"			 =>	$data["entity_type_id"],
			"entity_id"					 =>	$data["entity_id"],
		]);
		
	}
	
	/**
	 * Removes record
	 * 
	 * @param App\Models\Profile\Gallery $gallery
	 */
	public static function removeGallery(Gallery $gallery)
	{
		
		//if (file_exists(public_path() . self::$path_gallery . $gallery->image)) var_dump(unlink(public_path() . self::$path_gallery . $gallery->image));
		
		$gallery->delete();
		
	}
	
	/**
	 * Returns current ids associated to Gallery model
	 * 
	 * @param Integer $entityType
	 * @param Integer $entityId
	 * @return array $ids[]
	 */
	public static function getCurrentIDs($entityType, $entityId)
	{
		
		$galleries						 =	Gallery::where("entity_type_id", "=", $entityType)
			->where("entity_id", "=", $entityId)
			->get()
		;
		
		return (new self)->getModelIDs($galleries);
		
	}
	
}
