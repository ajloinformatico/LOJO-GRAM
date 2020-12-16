<?php

namespace App\Http\Controllers;

use App\User;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; //Para las imágenes
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $user = User::findOrFail($id);
        //$images = DB::table('images')->where('user_id',$id)->get();
        $images = Image::where('user_id','=',$id)->orderBy('id','desc')->paginate(5);
        return view('user.profile')->with('user',$user)->with('images',$images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  {$id}
     * @return \Illuminate\Http\Response
     */
    public function favs($id)
    {
        $user = User::findOrFail($id);
        //$images = Image::where('user_id','=',$id)->orderBy('id','desc')->paginate(5);
        $images = Image::orderBy('id','desc')->paginate(5);
        return view('user.favs')->with('user',$user)->with('images',$images);

    }

    /**
     * Load users search view
     * @param id : User id
     * @return \Illuminate\Http\Response
     */
    public function search($id)
    {
        return view('user.search');
    }

    /**
     * Devuelve la vista de configuración del empleado.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function config($id)
    {
        //$user = DB::table('users')->where('id',$id)->get('surname'); //Select del usuario a partir de la id
        $user = User::findOrFail($id); //ORM
        //return response()->json($user);
        return view('user.config', compact('user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lUser  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newDates = request()->except(['_token','_method']);//Selecciono todo menos el token y el método

        //Campura la imágen en un objeto
        $image_path = $request->file('image_profile');

        if($image_path){
            //Nombre_a_la_imagen = id_nombre.ext
            $image_path_name = $id."_".$image_path->getClientOriginalName();

            //Storage::delete(['app/public/users'.Auth::user()->image_profile]); //Si existiese alguna imagen la elimina
            Storage::disk('users')->delete(Auth::user()->image_profile); //Elimina la imágen
            $image_path->storeAs('public/users', $image_path_name); //Almacena en el directorio users de storage con el nombre image_path_name

            $newDates['image_profile'] = $image_path_name; //Coloco en el array de los nuevos datos el nombre de la imagen
        }else{
            //$_SESSION['message'] = 'La imágen no la has actualizada';
        }
        //Actualiza la base de datos
        $newDates['password'] = Hash::make($newDates['password']); //hago el hash de la contraseña antes de insetar
        $oldDates = User::where('id',"=",$id)->update($newDates);
        return redirect("/user/". $id ."/config")->with('message', 'the profile was updated correctly');
    }

}
