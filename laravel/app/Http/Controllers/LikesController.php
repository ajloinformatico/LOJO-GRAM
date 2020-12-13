<?php

namespace App\Http\Controllers;

use App\like;

class LikesController extends Controller
{


    /**
     * Crea una nueva entrada en la tabla de likes
     * @param id $user_id : user id
     * @param id $image_id: image_id
     * @return redirect ('/home')
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
     * Remove the specified resource from storage.
     *
     * @param  id  $id: image id
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
