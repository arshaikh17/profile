<?php

namespace App\Http\Controllers\Expenses;

use Illuminate\Http\Request;
use App\Http\Controllers\Expenses\ExpensesController as Controller;

use App\Models\Expenses\{
	Tag
};

class TagController extends Controller
{
	
	/**
	 * Saves tag
	 * 
	 * @param Illuminate\Http\Request $request
	 */
	public function store(Request $request)
	{
		
		$this->service->save(new Tag, array_merge($request->toArray(), ["date" => $this->date]));
		
		return redirect()->back()->with("status", "Tag saved");
		
	}
	
	/**
	 * Updates tag
	 * 
	 * @param Illuminate\Http\Request $request
	 * @param App\Models\Expenses\Tag $tag
	 */
	public function update(Request $request, Tag $tag)
	{
		
		$this->service->save($tag, $request->toArray());
		
		return redirect()->back()->with("status", "Tag saved");
		
	}
	
}
