<?php

namespace App\Http\Services;

class UploadService{
	public function store($request)
	{
		if($request->hasFile('file')){
			try {
				$name = $request->file('file')->getClientOriginalName();
				$myPath = 'uploads/' . date('Y/m/d');
				$path = $request->file('file')->storeAs(
				    'public/' . $myPath, $name
				);
				return '/storage/' . $myPath . '/' . $name; 
			} catch(\Exception $error){
				return false;
			}
		}
	}
}