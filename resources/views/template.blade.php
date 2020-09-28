@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="height:50px"></div>
                    <h1>Reserva</h1>
                    <p class="lead">
                    <h3>Calendario - evento</h3>
                    <a class="btn btn-default"  href="{{ asset('/Evento/form') }}">Crear un evento</a>
                </div> <!--fin card-header -->

                <div class="card-body">
                    <div class="cabecera">
                        <div class="row header-calendar"  >

                            <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
                            
                            </div>

                        </div>
                        <div class="row dias" >
                            <div class="col header-col">Lunes</div>
                            <div class="col header-col">Martes</div>
                            <div class="col header-col">Miercoles</div>
                            <div class="col header-col">Jueves</div>
                            <div class="col header-col">Viernes</div>
                            <div class="col header-col">Sabado</div>
                            <div class="col header-col">Domingo</div>
                        
                        </div>
                    </div>  
                </div><!--fin card-body -->
            </div>
        </div>
    </div>
</div>
@endsection
