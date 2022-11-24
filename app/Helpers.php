<?php

namespace App\Helpers;

class Helper {

    public static function coverarryTostring($array){
        $data = implode(',',$array);
        return $data;
    }

    public static function convertToarry($string){
        $data = explode(',',$string);
        return $data;
    }

    public static function imageUpload($file, $pathFolder){
        $image = time().'.'.$file->extension();  
        $file->move(public_path('admin/uploads/'.$pathFolder), $image);
        return $image;
    }

}