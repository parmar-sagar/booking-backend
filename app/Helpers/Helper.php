<?php

namespace App\Helpers;
use Godruoyi\Snowflake\Snowflake;

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
        $image = resolve('snowflake')->id().'.'.$file->getClientOriginalExtension();  
        $dt=$file->move(public_path('admin/uploads/'.$pathFolder), $image);
        return $image;
    }

    public static function dateformateFromdb($date){
                $exp_date = strtotime($date);
                $expDate = date('m/d/Y', $exp_date);
                return $expDate;
    }
    public static function dateformateFrominput($date){
        $exp_date = strtotime($date);
        $expDate = date('Y-m-d', $exp_date);
        return $expDate;
}

}