<?php

namespace App\Http\Controllers;

use App\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage; //Para las imágenes
use Illuminate\Support\Facades\File; //Para las imágenes


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
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

            Storage::delete(['storage/app/public/users/'.Auth::user()->image_profile]);
            $image_path->storeAs('public/users', $image_path_name); //Almacena en el directorio users de storage con el nombre image_path_name

            $newDates['image_profile'] = $image_path_name; //Coloco en el array de los nuevos datos el nombre de la imagen
            //$_SESSION['message'] = 'Has actualizado también la imágen';
        }else{
            //$_SESSION['message'] = 'La imágen no la has actualizada';
        }
        //Actualiza la base de datos
        $oldDates = User::where('id',"=",$id)->update($newDates);
        return redirect("/user/". $id ."/config")->with('message', 'the profile was updated correctly');
    }
    /*
    OTRA FORMA DE HACER LA INSERCCIÓN
    $image = $request->file('imagen');
    $image->move('uploads', $image->getClientOriginalName()); //Guarda en users
    $nombre_tabla->imagen = image->getClientOriginalName(); //Guarda en la base de datos
    */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
