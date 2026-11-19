<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImageService
{
    public function store(UploadedFile $image, string $directory): string
    {
        $imageName = Str::uuid() . '.' . $image->extension();

        $image->move(
            public_path($directory),
            $imageName
        );

        return $directory . '/' . $imageName;
    }

    public function delete(?string $path): void
    {
        if (!$path) {
            return;
        }

        $fullPath = public_path($path);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
}
