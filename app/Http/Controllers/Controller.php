<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

abstract class Controller
{
    /** Resizes and saves both the large and thumbnail images. */
    protected function resizeAndSaveImage($file, $folderName, $originalFileName, $width = 430, $height = 270)
    {
        $folderPath = public_path($folderName);
        $filename = date('H-i').'_'.$originalFileName;
        if (!File::exists($folderPath)) {
            File::makeDirectory($folderPath, 0755, true);
        }
        $categoryImagePath = $folderPath . '/' . $filename;
        // dd($folderPath, $categoryImagePath);
        Image::make($file)
            ->resize($width, $height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })
            ->save($categoryImagePath, 80); // Compress image

        return $folderName . '/' . $filename;
    }
}
