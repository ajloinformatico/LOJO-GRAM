@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!--Si no hay imágenes muestra mensaje de bienvenida-->
            @if(!$images->count() == 0)
                <h1 style="text-align: center;">{{$user['name']}} Profile</h1>
                @foreach($images as $image)
                    <div class="card mb-5">
                        <div class="card-header">
                            <!--Muestra la imágen del usuario-->
                            <p>
                            @if((DB::table('users')->where('id',$image['user_id'])->value('image_profile')) != 'standUser.jpg')
                                <img  src="{{asset('/storage/users/'. DB::table('users')->where('id',$image['user_id'])->value('image_profile'))}}" alt="imagen del usuario" title="imágen del usuario" width='50px' class="rounded-circle">
                                        <!--Si no carga la imágen por-->
                            @else
                                <img  src="{{asset('/storage/general/standUser.jpg')}}" alt="imágen del usuario" title="imágen del usuario" width='50px' class="rounded-circle">
                            @endif
                            {{DB::table('users')->where('id',$image['user_id'])->value('name')." | @".DB::table('users')->where('id',$image['user_id'])->value('nick')}}</p>
                        </div>
                        <!--Cuerpo-->
                        <div class="card-body">
                            <!--imagen subida y comentario-->
                            <div class="card-img-top-center" style="text-align: center;">
                                <img style="max-width: 688px; max-height: 400px;" src="{{asset('storage/images/'.$image['image_path'])}}">

                            </div>
                            <!--nombre y fecha en la que se subio-->
                            <div style="text-align: left; margin-top: 1.5em;">
                                <p>{{'@'.DB::table('users')->where('id',$image['user_id'])->value('nick').' | '}}
                                    {{$image['created_at']}}
                                </p>
                                <!--Comentario de la foto-->
                                <b><p style="text-align: left" class="card-text">{{$image['description']}}</p></b>
                                <hr>

                            </div>

                            <div>
                                <!--LIKES UPDATE DELETE-->
                                <!--Con la consulta compruebo-->
                                <p style="display: none;" >{{$checkUserLike =DB::table('likes')->where('user_id',Auth::user()->id)->where('image_id',$image['id'])->value('image_id')}}</p>
                                @if($checkUserLike != $image['id'])<!--like-->
                                    <a style="color: gray; margin-right: .2em;" href="{{url('like/'.Auth::user()->id.'/'.$image['id'])}}"><i class="fa fa-heart fa-2x" aria-hidden="true"></i></a>{{$likesCount = DB::table('likes')->where('image_id',$image['id'])->count()}}
                                @else <!--Dislike-->
                                    <p style="display: none;">{{$idLike = DB::table('likes')->where('user_id',Auth::user()->id)->where('image_id',$image['id'])->value('id')}}</p>
                                    <a style="color: red; margin-right: .2em;" href="{{url('dislike/'.$idLike)}}"><i class="fa fa-heart fa-2x" aria-hidden="true"></i></a>{{$likesCount = DB::table('likes')->where('image_id',$image['id'])->count()}}

                                @endif
                                <!--Muestra los botones si la imagen es del usuario-->
                                @if ($image['user_id'] == Auth::user()->id)
                                    <a href="{{ url('/image/'.$image['id'].'/update/') }}"><button  type="button" class="btn btn-primary">Updaete</button></a>
                                    <button  type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Delete</button>

                                    <!--Modal eliminar-->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">IMPORTANT</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure that you want to delete?
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                              <a href="{{ url('/image/destroy/'.$image['id']) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                @endif
                                <h4 style="margin-top: .5em;">Comments ({{$cantidad =  DB::table('comments')->where('image_id',$image['id'])->count()}})</h4>
                                <hr>
                                <!--Formulario-->
                                <form method="POST"  enctype="multipart/form-data" action="{{ url("comment/save") }}"><!--Envio también la id pra hacer el update-->
                                    @csrf
                                    <!--input oculto con la id del usuario-->
                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id" id="user_id"/>
                                    <!--input oculeto con la id de la foto-->
                                    <input type="hidden" value="{{$image['id']}}" name="image_id" id="image_id"/>
                                    <!--Campo comentario-->
                                    <div class="form-group row">

                                        <div class="col-md-12">
                                            <textarea syle="resize: none;" id="description" class="form-control @error('description') is-invalid @enderror" name="description"  autocomplete="description" required>
                                            </textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!--Campo submit-->
                                    <div class="form-group row ">
                                        <div class="ml-3">
                                            <button type="submit" class="btn btn-warning">
                                                {{ __('Comment') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div>
                                    <!--Almaceno los comentarios-->
                                    <p style="display: none;">{{$comments = DB::table('comments')->where('image_id',$image['id'])->orderBy('id','desc')->get()}}</p>
                                     <!--Comprueba si existen comentarios-->
                                    @if($cantidad > 0)
                                        @foreach($comments as $comment)
                                            <p><b>{{'@'.$userAct = DB::table('users')->where('id', $comment->user_id)->value('nick')}}</b> | {{$comment->description}} </p>
                                            <!--Si el id del comentario es el mismo que el del usuario botón eliminar-->
                                            @if($comment->user_id == Auth::user()->id)
                                                <!--Botón de eliminar con el modal-->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#ModalComment">Delete comment</button>
                                                <div class="modal fade" id="ModalComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">IMPORTANT</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure that you want to delete comment?
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                          <a href="{{ url('/comment/destroy/'.$comment->id) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        <p> Hy <b>{{'@'.Auth::user()->nick}}</b> Be the first to comment</p>
                                    @endif
                                </div>



                            </div>
                        </div>

                    </div>
                @endforeach
            <!--Mensage si no hay cartas-->
            @else
            <div class="card">
                    <div class="card-header">
                        <h1 style="text-align: center;">{{$user['name']}} Profile</h1>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Here you will see your own images
                    </div>
                </div>

            @endif
        </div>
    </div>
</div>
@endsection
