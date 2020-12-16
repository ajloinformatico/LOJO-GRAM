<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $table = "users";
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'surname', 'nick', 'email', 'password', 'image_profile'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //1:M con imágenes
    //Muchos imágenes asociadas a un usuario
    public function images(){
        return $this->hasMany('App\Image')->orderBy('id','desc');
    }

    //1:M con comentarios
    //Muchos comentarios están asociados a un usuario
    public function comentarios(){
        return $this->hasMany('App\Comment')->orderBy('id','desc');
    }


    //1:M con Likes
    //Muchos likes están asociados a un usuario
    public function likes(){
        return $this->hasMany('App\Like')->orderBy('id','desc');
    }





}
