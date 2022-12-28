<?php

namespace App\Helpers;
use Godruoyi\Snowflake\Snowflake;

class Helper {

    public static function implode(array $array){
        $data = implode(',',$array);
        return $data;
    }

    public static function explode(String $string){
        $data = explode(',',$string);
        return $data;
    }

    public static function uploadFile($file, $pathFolder){
        $snowflake = new \Godruoyi\Snowflake\Snowflake;
        $validated['random_id'] = $snowflake->id();
        $image = $snowflake->id().'.'.$file->getClientOriginalExtension();  
        $dt=$file->move(public_path('admin/uploads/'.$pathFolder), $image);
        return $image;
    }

}