<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
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
        //Imagen introducida
        $image_path = $request->file('image_profile');
        //return response($newDates);

        if($image_path){
            //Almacena el nombre de la imágen para guardarla en su directorio
            //$image_path_name = time()."_".$image_path->getClientOriginalName();
            $image_path->storeAs('users', $id); //Carpeta directamente
            //Storage::disk('users')->put($image_path_name, File::get($image_path));
            //$_SESSION['message'] = 'La imágen ha sido actualizada';
            //return response coge");

        }else{
            //return response("no la coge");
            //$_SESSION['message'] = 'La imágen no ha sido actualizada';
        }
        //$_SESSION['message'] += 'Los datos seleccionados se han insertado correctamente';
        $oldDates = User::where('id',"=",$id)->update($newDates);
        return redirect("/user/". $id ."/config");
    }
    /*
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
