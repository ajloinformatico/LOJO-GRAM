<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table= 'comments';

    //M:1 con imagenes

    //Muchos a uno una imagen tinen muchos comentarios
    public function images(){
        return $this->belongsTo('App\Image', 'image_id');

    }

    //M:1 con usuaruio
    //Muchos a uno un usuario da muchos comentarios
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'user_id', 'image_id'
    ];
    //
}
