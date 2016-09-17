<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    protected $fillable = [
        'street',
        'city',
        'zip_code',
        'state',
        'country',
        'price',
        'description'
    ];
    
    public function photos(){
        return $this->hasMany('App\Photo');
    }
    
    
    //scope query to those located at a given address
//    public function scopeLocatedAt($query, $zip_code, $street){
//        $street = str_replace('-', ' ', $street);
//        return $query->where(compact('zip_code','street'));
//    }
    
    public static function locatedAt($zip_code, $street){
        $street = str_replace('-', ' ', $street);
        return static::where(compact('zip_code','street'))->firstOrFail();
    }
    
    public function getPriceAttribute($price){
        return '$'. number_format($price);
    }
    
    public function addphoto(Photo $photo){
        return $this->photos()->save($photo);
    }
    
    public function owner(){
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public function ownedBy(User $user){
        return $this->user_id = $user->id;
    }
    
    public function path(){
        return $this->zip_code.'/'.$this->street;
    }
}
