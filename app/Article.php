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

    // Esta parte permite obtener los datos de users para realizar la busqueda con scope,
    //Antes de esto se debe obtener la funcion en el controller para que permita obtener los datos
    //En ella se trae la variable llamada names y aqui en el scope se agrega con ella ej->scopeNames
    // se debe poner el nombre despues de scope

    public function scopeNames($articles, $q)
    {
        if(trim($q)){
            $articles->where('name', 'LIKE', "%$q%");
        }
    }
    
}
