<?php

namespace App\Http\Utilities;

class Country {
    
    protected static $countries = [
        "India" => "in",
        "unites States" => "us",
    ];

    public static function all(){
        //return array_keys(static::$countries);
        return static::$countries;
    }
    
}
