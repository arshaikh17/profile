<?php

namespace App\Models\Wishlists;

use Illuminate\Database\Eloquent\Model;

use App\Models\Comics\Arc;
use App\Models\Comics\Issue;

class Wishlist extends Model
{
	
	/* =====================================================
	 * 					WISHLIST METHODS					
	 * ===================================================*/
	
	/**
	 * Gets comics for wishlists
	 * 
	 * @return App\Models\Comics\Arc $arcs[]
	 */
	public static function getComicsWishlists()
	{
		
		$issues							 =	Issue::where("owned_status", "=", Issue::STATUS_WISHLIST)
			->get()
		;
			
		$comics							 =	[];
		
		foreach ($issues as $issue) {
			
			$arcOrSeriesTitle			 =	$issue->arc ? $issue->arc->title : $issue->series->title;
			
			$comics[$arcOrSeriesTitle]["arcOrSeries"]		 =	[
				"model"					 =>	$issue->arc ?: $issue->series,
				"type"					 =>	$issue->arc ? "arc" : "series"
			];
			$comics[$arcOrSeriesTitle]["issues"][]			 =	$issue;
			
		}
		
		return $comics;
		
	}
	
	
}
