<?php

namespace App\Traits;

use Image;


trait ImageFileTrait {

    public function resize ($path, $width=600, $height=400, $keepAspect=true)
    {
        ini_set('memory_limit','256M');
        $image = Image::make(public_path($path))->orientate();
	if ($keepAspect) {
	    $image->resize($width, $height, function($constraint) {
		$constraint->aspectRatio();
                $constraint->upsize();
	      });
        }
        else {
	    $image->resize($width, $height);
        }
        $image->save(public_path($path));
    }
}
