<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    //Relación One To Many 1 imágen -> m comentarios
    public function comments(){
        return $this->hasMany('App\Comments')->orderBy('id','desc');
    }

    //Relación one to Many likes(
    public function likes(){
        return $this->hasMany('App\likes')->orderBy('id','desc');
    }

    //Relación Many to One 1 usario -> m imagenes
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }


}
