<?php

namespace App\Models\Comics;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ComicsTrait;

use App\Models\Comics\Character;

class Collectible extends Model
{
	
	/**
	 * Traits
	 */
	use ComicsTrait;
	
	/**
	 * Constants
	 */
	CONST CSS_HEIGHT					 =	0.048225;
	CONST CSS_WIDTH						 =	0.0588201876477606;
	
	/**
	 * Fillables
	 */
	protected $fillable					 =	[
		"name",
		"description",
		"price",
		"image",
		"link",
		"height",
		"width",
		"depth",
		"order_id",
		"character_id",
		"scale_id",
		"bought_from_id",
		"manufacturer_id",
		"brand_id",
	];
	
	/**
	 * Appends
	 */
	protected $appends					 =	[
		"css_height",
		"css_width",
		"css_values"
	];
	
	/* =====================================================
	 * 						STATIC METHODS					
	 * ===================================================*/
	
	/* =====================================================
	 * 							ACCESSORS					
	 * ===================================================*/
	
	/**
	 * Calculates CSS height
	 * 
	 * @return Double
	 */
	public function getCssHeightAttribute()
	{
		
		return $this->height / self::CSS_HEIGHT;
		
	}
	
	/**
	 * Calculates CSS width
	 * 
	 * @return Double
	 */
	public function getCssWidthAttribute()
	{
		
		return $this->width / self::CSS_WIDTH;
		
	}
	
	/**
	 * Calculates CSS values
	 * 
	 * @return String
	 */
	public function getCssValuesAttribute()
	{
		
		return "max-height: {$this->css_height}px; max-width: {$this->css_width}px;";
		
	}
	
	/* =====================================================
	 * 						CLASS METHODS					
	 * ===================================================*/
	
	/**
	 * Returns associated scale of collectible
	 * 
	 * @return String
	 */
	public function scale()
	{
		
		return config("comics.scales")[$this->scale_id] ?? false;
		
	}
	
	/**
	 * Returns associated vender which collectible is bought from
	 * 
	 * @return Array
	 */
	public function boughtFrom()
	{
		
		return config("comics.vendors")[$this->bought_from_id] ?? false;
		
	}
	
	/**
	 * Returns manufacturer of collectible
	 * 
	 * @return Array
	 */
	public function manufacturer()
	{
		
		return config("comics.vendors")[$this->manufacturer_id] ?? false;
		
	}
	
	/**
	 * Returns brand associated to the collectible
	 * 
	 * @return String
	 */
	public function brand()
	{
		
		return config("comics.brands")[$this->brand_id] ?? false;
		
	}
	
	/* =====================================================
	 * 							RELATIONS					
	 * ===================================================*/
	
	/**
	 * Returns character associated with the collectible
	 * 
	 * @return App\Models\Comics\Character
	 */
	public function character()
	{
		
		return $this->belongsTo(Character::class, "character_id", "id");
		
	}
	
}


