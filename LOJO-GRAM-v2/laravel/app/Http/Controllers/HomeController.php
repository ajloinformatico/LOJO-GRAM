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
        //

        //se le indica que caad página mostrará solo 5 imágenes por cada id
        $images = Image::orderBy('id','desc')->paginate(5);

        //Creo arrays vacío para las distintas tablas
        $users = [];
        //$likes = [];
        //$coments = [];
        //En bucle voy cogiendo los datos para mandarlo a la vista
        //Love normal loops
        for($i = 0; $i < count($images); $i++){
            $users[$i] = $images[0]->user();
            //$users[$i] = User::find($images[$i]['user_id']);
            //Dame id nombre nick e imagen profile de los usuarios que tengan una id en la imagen
            //$users[$i] = DB::table('users')->select('id' ,'name','surname', 'image_profile')->where('id',$images[$i]['user_id'])->first();
            //$likes[$i] = DB::table('likes')->select('id','user_id','image_id')->where('image_id',$images[$i]['id'])->first();
            //$coments[$i] = DB::table('comments')->select('id', 'user_id', 'image_id', 'description')->where('image_id', $images[$i]['id'])->first();
        }
        return response($users);
        return view('home')->with('images', $images);



    }
    /*Compact es lo mismo que
    $datos = ['posts' => $posts, 'etiqueta' => $etiqueta];
    return view('welcome')->with('datos', $datos);

    COMPACTA LOS DATOS Y LOS DEVUELVE
    */
}
