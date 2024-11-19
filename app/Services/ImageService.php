<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class ImageService
{



    public function optimizeAndStore($image, $path, $sizes = [])
    {
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $optimizedImages = [];

        // Original image
        $originalPath = $path . '/original/' . $filename;
        Storage::put($originalPath, Image::make($image)->encode());
        $optimizedImages['original'] = Storage::url($originalPath);

        // Generate different sizes
        foreach ($sizes as $size) {
            $resizedPath = $path . '/' . $size . '/' . $filename;
            Storage::put(
                $resizedPath,
                Image::make($image)
                    ->resize($size, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode()
            );
            $optimizedImages[$size] = Storage::url($resizedPath);
        }

        return $optimizedImages;
    }
}
