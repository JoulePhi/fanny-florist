<?php

namespace App\Services;

class AssetVersioning
{
    public static function version($path)
    {
        $realPath = public_path($path);

        if (file_exists($realPath)) {
            return $path . '?v=' . filemtime($realPath);
        }

        return $path;
    }
}
