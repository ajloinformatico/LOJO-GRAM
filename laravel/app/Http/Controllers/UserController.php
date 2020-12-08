<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $newDates = request()->except(['_token','_method','password_confirmation']);//Selecciono todo menos el token y el método

        $oldDates = User::where('id',"=",$id)->update($newDates);

        return redirect("/home");
    }

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
