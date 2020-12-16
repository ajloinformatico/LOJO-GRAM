@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!--Muestra con las variables de sesión que agregado correctamente-->
            <!--Tus datos han sigo agregados correctamente-->
            <!--Creo que tengo que enviar por get un mensaje pero xd-->
            @if(session('message'))
                <div class="aler alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Profile Config') }}</div>

                <div class="card-body">
                    <form method="POST"   enctype="multipart/form-data" action="{{ url("image/update/".$image['id']) }}"><!--Envio también la id pra hacer el update-->
                        @csrf
                        {{ method_field('PATCH')}}


                         <!--Campo Imágen-->
                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">{{ __('Imagen')}}</label>

                            <div class="col-md-6">
                            <input id="image_path"  accept="image/*" type="file" class="form-control @error('image_path') is-invalid @enderror" name="image_path" value="{{$image['image_path']}}"  autocomplete="image_path">

                                @error('image_path')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--Campo descripción-->
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description')}}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="description" > {{$image['description']}}
                                </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <!--El campo de confirmar conrtaseña no es requerido ya que está dado ya de alta-->

                        <!--Campo submit-->
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#ModalUpdate">
                                    {{ __('Update') }}
                                </button>




                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


