@extends('layouts.app')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                <div class="text-center">
                    <h1> Propiedad </h1>
                </div>
                <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                               Nombre
                            </div>
                            <div>
                                <input type="text" class="form-control" name="nombre" id="txtNombre"></input>
                            </div>  
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                               Activo
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="1" id="defaultCheck2" Checked>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                               Color
                            </div>
                            <div class="form-group">
                                <select class="browser-default custom-select" onchange="objetoSeleccionado()" id="selColor"> 
                                    <option >elija un color</option>
                                    <option value="#F1948A" style="background:#F1948A">rojo</option>
                                    <option value="#D5F5E3" style="background:#D5F5E3">verde</option>
                                    <option value="#FCF3CF" style="background:#FCF3CF">amarillo</option>
                                    <option value="#E8DAEF" style="background:#E8DAEF">violeta</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="card-body">
                   <h2> Detalles <button class="btn btn"><i class="far fa-plus-circle fa-2x"></i></button></h2>
                   <div class="row">
                        <div class=
                        <div class="col-md-6">
                        
                            <H3> Plazas</H3>
                           
                        </div> 
                        <div class="col-md-6">
                            <H3>3</H3>
                        </div>
                    
                    </div> 
                </div> <!-- fin body-->
            </div>
        </div>
    </div>
</div>
<script>
function objetoSeleccionado(){
    var color = document.getElementById("selColor");
    color.style.backgroundColor = color.value;
    document.getElementById("txtNombre").style.backgroundColor = color.value;
}
</script>
@endsection
