<?php

namespace App\Http\Requests\Comics;

use Illuminate\Foundation\Http\FormRequest;

class CollectibleRequest extends FormRequest
{
	
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		
		return true;
		
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		
		return [
			"name"						 =>	["required"],
			"description"				 =>	["string"],
			"price"						 =>	["required"],
			//"image"						 =>	["required", "mimes:jpg,png,jpeg"],
			"link"						 =>	["string"],
			"height"					 =>	["required"],
			"width"						 =>	["required"],
			"depth"						 =>	["required"],
			"order_id"					 =>	["string"],
			"character_id"				 =>	["exists:comics_characters,id"],
			"scale_id"					 =>	["integer", "required"],
			"bought_from_id"			 =>	["integer", "required"],
			"manufacturer_id"			 =>	["integer"],
			"brand_id"					 =>	["integer"],
		];
		
	}
	
}
