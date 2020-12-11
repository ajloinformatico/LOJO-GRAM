<?php

namespace App\Http\Controllers;

use App\Image;
use App\images;
use App\User;
use Faker\Provider\ar_JO\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; //Para las imágenes
use Illuminate\Support\Facades\File; //Para las imágenes

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Paginación de las imágenes

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = User::findOrFail($id);
        return view('image.create', compact('user')); //Llama a la vista crearte juento con su id

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {

        $datos = request()->except(['_token', '_method']);
        $image_path = $request->file('image_path');
        if($image_path){
            $image_path_name = $id."_".$image_path->getClientOriginalName();

            $image_path->storeAs('public/images', $image_path_name);
            //Guarda la imágen en base de datos
            Image::create([
                'user_id' => $id,
                'image_path' => $image_path_name,
                'description' => $datos['description'],
            ]);
            return redirect("/home");

        }


        //Error return
        return redirect("/image/".$id."/save")->with('message', 'There was a problem uploading the image');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy(images $images)
    {
        //
    }
}
