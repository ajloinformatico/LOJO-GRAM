<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Image;

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
        if(DB::table('images')->groupBy('user_id')->count() > 0){
            //Cargo las imágenes en el index
            $images = Image::orderBy('id','desc')->paginate(5);
            //return response($images);
            return view('home',compact([$images, 'images']));
        }else{
            return view('home');
        }


    }
    /*Compact es lo mismo que
    $datos = ['posts' => $posts, 'etiqueta' => $etiqueta];
    return view('welcome')->with('datos', $datos);

    COMPACTA LOS DATOS Y LOS DEVUELVE
    */
}
