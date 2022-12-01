<?php

namespace App\Helpers;

class Helper {

    public static function implode($array){
        $data = implode(',',$array);
        return $data;
    }

    public static function explode($string){
        $data = explode(',',$string);
        return $data;
    }

    public static function uploadFile($file, $pathFolder){
        $image = time().'.'.$file->extension();  
        $file->move(public_path('admin/uploads/'.$pathFolder), $image);
        return $image;
    }

}