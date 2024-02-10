<?php

namespace App\Http\Libs;

use Illuminate\Database\Eloquent\Collection;

class Helper {
    /**
        * Получить галерею девушки
    */
    public static function getPhotosGirl(string $folder)
    {
        return array_diff(scandir(public_path('images/girls/'.$folder.'/')), ['.', '..', 'preview', 'video.mp4']);
        
    }
    
    /**
        * Получить галерею инерьера
    */
    public static function getPhotosInterier()
    {
        return array_diff(scandir(public_path('images/interier/')), ['.', '..', 'preview']);
    }
}
