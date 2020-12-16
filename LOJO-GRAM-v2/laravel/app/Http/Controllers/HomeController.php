<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Image;
use App\User;
use App\Like;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Si hay imágenes
        /*
        if(DB::table('images')->groupBy('user_id')->count() > 0){
            //Cargo las imágenes en el index
            $images = Image::orderBy('id','desc')->paginate(5);
            //return response($images);
            return view('home',compact([$images, 'images']));
        }else{
            return view('home');
        }*/
        //se le indica que caad página mostrará solo 5 imágenes por cada id
        $images = Image::orderBy('id','desc')->paginate(5);

        //Creo un array vacío para los usuarios
        $users = [];
        //Love normal loops
        for($i = 0; $i < count($images); $i++){
            //Dame id nombre nick e imagen profile de los usuarios que tengan una id en la imagen
            $users[$i] = DB::table('users')->select('id' ,'name','surname', 'image_profile')->where('id',$images[$i]['user_id'])->first();
        }



        return response($users);
        $likes = Like ::OrderBy('id','desc')->paginate(5);

        return view('home', array(
            'images' => $images,
            'users' => $users,
            'likes' => $likes,
        ));


    }
    /*Compact es lo mismo que
    $datos = ['posts' => $posts, 'etiqueta' => $etiqueta];
    return view('welcome')->with('datos', $datos);

    COMPACTA LOS DATOS Y LOS DEVUELVE
    */
}
