<?php

namespace App\Functions;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class Helper{
    public static function generateSlug($string, $model){
        $slug = Str::slug($string, '-');
        $original_slug = $slug;

        $exists = $model::where('slug', $slug)->first();
        $c = 1;

        while($exists){
            $slug = $original_slug . '-' . $c;
            $exists = $model::where('slug', $slug)->first();
            $c++;
        }

        return $slug;
    }

    public static function checkType($string, $model){
        $type = $string;

        $exists = $model::where('name', $type)->first();

        return !$exists;
    }

    public static function getTypeId($string, $modle){
        $type = $string;

        $type_id = $modle::where('name', $type)->value('id');

        return $type_id;
    }
}
