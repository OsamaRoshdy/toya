<?php


namespace App\Essentials\Traits;

use App\Http\Foundation\Classes\Helper;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


const STORAGE_TYPE = 'public';
const DEFAULT_IMAGE = 'default.jpg';

trait ImageTrait
{

    public static function storeImage($image, $location)
    {
        return self::privateStore($image, $location);
    }

    public static function updateImage($image, $oldImage, $location)
    {
        if ($image) {
            self::privateDelete($oldImage, $location);
            return self::privateStore($image, $location);
        }
        return $oldImage;
    }

    public static function deleteImage($image, $location)
    {
        self::privateDelete($image, $location);
    }

    private static function privateStore($image, $location)
    {
        if (is_array($image)) {
            $hash_images = [];
            foreach ($image as $img) {
                array_push($hash_images, self::storeFile($img, $location));
            }
            return $hash_images;
        }

        return self::storeFile($image, $location);
    }

    private static function storeFile($image,string $location)
    {
        Image::make($image)
            ->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        $image->store(Helper::BASE_PATH . '/' . $location , STORAGE_TYPE);
        return $image->hashName();
    }

    private static function privateDelete($image, $location)
    {
        if (is_array($image)) {
            foreach ($image as $img) {
                self::deleteFile($img, $location);
            }
        } else {
            self::deleteFile($image, $location);
        }
    }

    private static function deleteFile($image, string $location)
    {
        if ($image !== DEFAULT_IMAGE) {
            Storage::disk(STORAGE_TYPE)->delete(Helper::BASE_PATH . '/' . $location . '/' . $image);
        }
    }

}
