<?php

/**
 * This file provides helping methods for file handling like upload, existence check or delete
 */

use Illuminate\Support\Facades\Storage;

/**
 * Uploads file to storage
 * 
 * @param String $disk
 * @param String $newFileName
 * @param String $file
 * @param String $oldFileName
 */
function moveToStorage($disk, $newFileName, $file, $oldFileName = false)
{
	
	if ($oldFileName && Storage::disk($disk)->exists($oldFileName)) Storage::disk($disk)->delete($oldFileName);
	
	Storage::disk($disk)->put($newFileName, File::get($file));
	
}
