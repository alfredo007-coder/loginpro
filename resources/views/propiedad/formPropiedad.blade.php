@extends('layouts.app')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <div class="text-center">
                    <h1> Listado de Propiedades </h1>
                </div>
                <div class="row">
                        <div class="col-md-6">
                            <div class="fomr-group">
                                <label>Nombre</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="fomr-group">
                                <label>Color</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="fomr-group">
                                <label>Activo</label>
                            </div>
                        </div>
                        <div class="col-md-4">
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
                        <div class="row">
                            <div class="col-md-6">
                                <div class="fomr-group">
                                    <label>{{$propiedad->nombre}}</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="fomr-group">
                                    <label>{{$propiedad->color}}</label>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="fomr-group">
                                    <label><i class="far fa-check-square"></i></label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="fomr-group">
                                    <label><i class="far fa-list-alt"></i></label>
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
