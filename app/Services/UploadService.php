<?php
namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UploadService
{
    static function send($file){
        $name = md5(rand(111, 999) . microtime());
        $path = $name;
        $path_thumb317_241 = 'thumb_317_241' . $name;
        $path_thumb570_515 = 'thumb_570_515' . $name;
        $path_thumb286_241 = 'thumb_286_241' . $name;
        $path_thumb100_65 = 'thumb_100_65' . $name;
        $extension = $file->getClientOriginalExtension();

        $image_thumb317_241 = Image::make($file);
        $image_thumb570_515 = Image::make($file);
        $image_thumb286_241 = Image::make($file);
        $image_thumb100_65 = Image::make($file);

        $image = Image::make($file);

        $image_thumb317_241->fit(317, 241, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_thumb570_515->fit(570, 515, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_thumb286_241->fit(286, 241, function ($constraint) {
            $constraint->aspectRatio();
        });
        $image_thumb100_65->fit(100, 65, function ($constraint) {
            $constraint->aspectRatio();
        });

        Storage::put('/reports/' . $path_thumb317_241 . '.' . $extension, (string) $image_thumb317_241->encode());
        Storage::put('/reports/' . $path_thumb570_515 . '.' . $extension, (string) $image_thumb570_515->encode());
        Storage::put('/reports/' . $path_thumb286_241 . '.' . $extension, (string) $image_thumb286_241->encode());
        Storage::put('/reports/' . $path_thumb100_65 . '.' . $extension, (string) $image_thumb100_65->encode());

        Storage::put('/reports/' . $path . '.' . $extension , (string) $image->encode());

        return $path . '.' . $extension;
    }
}