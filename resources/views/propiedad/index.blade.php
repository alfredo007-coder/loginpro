@extends('layouts.app')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                <div class="text-center">
                    <h1> Listado de Propiedades <button class="btn btn"><i class="far fa-plus-circle fa-3x"></i></button> </h1>
                </div>
                <div class="row">
                        <div class="col-md-8 text-center">
                            <div class="fomr-group">
                                <label>Nombre</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="fomr-group">
                                <label>Activo</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="fomr-group">
                                <label>Detalles</label>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach  ($propiedades as $propiedad)
                        <div class="row mt-2" id={{$propiedad->id}}>
                            <div class="col-md-8">
                                <div class="fomr-group text-center">
                                    <a href="{{route('propiedad.show' , $propiedad->id)}}">
                                    <button class="btn btn" style="width:100%">
                                        <div style="border-radius: 15px; background:{{$propiedad->color}}">{{$propiedad->nombre}}</div>
                                    </button>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="fomr-group">
                                @if ($propiedad->estado == 1)
                                    <button class="btn btn"><i class="far fa-check-square fa-lg"></i></button>
                                @endif
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="fomr-group">
                                <button class="btn btn"><i class="far fa-list-alt fa-lg"></i></button>
                                </div>
                            </div>
                            
                        </div>
                    @endforeach
                </div> <!-- fin body-->
            </div>
        </div>
    </div>
</div>
@endsection
