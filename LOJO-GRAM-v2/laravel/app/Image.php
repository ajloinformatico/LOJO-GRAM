<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $tabe = 'images';

    //1:M con comments Muchos comentarios para una imágen
    public function comments(){
        return $this->hasMany('App\Comment')->orderBy('id','desc');
    }

    //1:M con Likes Muchos Likes para una imagen
    public function likes(){
        return $this->hasMany('App\Like')->orderBy('id','desc');
    }

    //M:1 con users Un unsuario tiene muchas imágenesc
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','image_path','description'
    ];
}
