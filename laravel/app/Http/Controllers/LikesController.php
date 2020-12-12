<?php

namespace App\Http\Controllers;

use App\like;
use Illuminate\Http\Request;

class LikesController extends Controller
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
     * Crea una nueva entrada en la tabla de likes
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id, $image_id)
    {
        Like::Create([
            'user_id' => $user_id,
            'image_id' => $image_id,
        ]);
        return redirect ('/home');


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
     * @param  \App\likes  $likes
     * @return \Illuminate\Http\Response
     */
    public function show(likes $likes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\likes  $likes
     * @return \Illuminate\Http\Response
     */
    public function edit(likes $likes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\likes  $likes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, likes $likes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\likes  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $like = Like::findOrFail($id);
        $like->delete();
        return redirect('/home');

    }
}
