<?php

/**
 * This file provides paths used in the application
 */

use Illuminate\Support\Facades\Storage;

/**
 * Returns comics collectibles items
 * 
 * @param String $file
 * 
 * @return Boolean
 */
function pathCollectibles($file)
{
	
	return checkFile("comics-collectibles", $file);
	
}

/**
 * Checks file in the specified path
 * 
 * @param String $disk
 * @param String $file
 * 
 * @return Boolean
 */
function checkFile($disk, $file)
{
	
	return Storage::disk($disk)->exists($file) ? Storage::disk($disk)->url($file) : false;
	
}
