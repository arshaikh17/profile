<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	
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
	 * Constants
	 */
	CONST ENTITY_PROJECT				 =	2;
	
	/**
	 * Scoped Variables
	 */
	private static $path_gallery		 =	"/uploads/gallery/";
	
	/**
	 * Creates or updates gallery image
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
	 * Removes Gallery image
	 * @param App\Gallery $gallery
	 */
	public static function removeGallery(Gallery $gallery)
	{
		
		//if (file_exists(public_path() . self::$path_gallery . $gallery->image)) var_dump(unlink(public_path() . self::$path_gallery . $gallery->image));
		
		$gallery->delete();
		
	}
	
	/**
	 * Returns current Gallery ids
	 * @param Integer $entityType
	 * @param Integer $entityId
	 * @return array $ids
	 */
	public static function getCurrentIDs($entityType, $entityId)
	{
		
		$ids							 =	[];
		
		$galleries						 =	Gallery::where("entity_type_id", "=", $entityType)
			->where("entity_id", "=", $entityId)
			->get()
		;
		
		foreach ($galleries as $gallery) {
			
			$ids[]						 =	$gallery->id;
			
		}
		
		return $ids;
		
	}
	
}
