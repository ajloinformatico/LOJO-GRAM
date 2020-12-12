<?php

namespace App\Http\Controllers;

use App\comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
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
        $datos = request()->except('_token');

        if($datos['description'] != ""){
            Comment::create([
                'user_id' => $datos['user_id'],
                'image_id' => $datos['image_id'],
                'description' => $datos['description'],
            ]);
            return redirect('/home');
        }
        return redirect('/home')->with('message', 'You have not commented anything');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comments  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $oldComment = Comment::findOrFail($id);
        $oldComment->delete();
        return redirect('/home');
        //
    }
}
