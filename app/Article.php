<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'name', 
        'image', 
        'description', 
        'user_id',
        'category_id'
    ];

    // public function scopeNintendo($query, $name)
    // {
    //     if($category_id)
    //     return $query->where('category_id', 'LIKE', "%category_id%");
    // }



    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function category() {
    	return $this->belongsTo('App\Category');
    }
    
}
