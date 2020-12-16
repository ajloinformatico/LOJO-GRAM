<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = "likes";
    //Aparte del id no tiene campos que se vatan a modificar son todas foraneas
    //M:1 con imagenes

    //Muchos a uno una imagen tinen muchos likes
    public function images(){
        return $this->belongsTo('App\Image', 'image_id');

    }

    //M:1 con usuaruio
    //Muchos a uno un usuario da muchos likes
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    protected $fillable = [
        'user_id', 'image_id'
    ];
}

