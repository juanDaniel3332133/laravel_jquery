<?php

namespace App\Traits;

use DB, Str, File;

trait ProductHelper
{
	public static function generateCode()
	{
		$last_product = DB::table('products')->orderBy('id','DESC')
	                                                ->limit(1)
	                                                ->get('id')
	                                                ->first();

	    $code_number = isset($last_product) ? 
	    				$last_product->id + 1:
	    				1;
	    
	    $code = str_pad("{$code_number}", 4, "0", STR_PAD_LEFT);

	    return "PRODUCTO{$code}";
	}

	public function saveImageAndReturnSavePath($image, $directory)
	{
		$image_name = Str::random(15).'_'.$image->getClientOriginalName();
		$save_path = "{$directory}/{$image_name}";

		if (!File::exists($directory))
			File::makeDirectory($directory, $mode = 0777, true, true);

		File::copy($image->path(), $save_path);

		return $save_path;		
	}

	public function removeImage($path)
	{
		return File::exists($path) ? File::delete($path) : false;
	}

} 