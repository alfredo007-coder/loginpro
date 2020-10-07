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

                <div class="card-body" id="fila">
                    <h2> Detalles <button class="btn btn" onclick="agregarDetalle()"><i class="far fa-plus-circle fa-2x"></i></button></h2>
                    <div class="row mt-2">
                        <div class="col-md-5 ml-2 text-center" style="border:1px solid; border-radius:25px">
                            <h4>Nombre</h4>
                        </div> 
                        <div class="col-md-5 ml-2 text-center" style="border:1px solid; border-radius:25px">
                            <h4>Valor</h4>
                        </div>
                        
                    </div> 
                    <div class="row mt-2">
                        <div class="col-md-5 ml-2 text-center" >
                            <input type="text" class="form-control" name="nombreDetalle[]" value="Plazas" disabled></input>
                        </div> 
                        <div class="col-md-5 ml-2 text-center">
                            <input type="number" class="form-control" name="detalle[]" value="2"></input>
                        </div>
                        <div class="col-md-1 text-center">
                            <button class="btn btn" onclick="quitarDetalle()" disabled><i class="fas fa-trash-alt fa-2x"></i></button>
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
function agregarDetalle(){
    //alert("hola");
    var objeto = document.getElementById("fila");
    objeto.innerHTML = objeto.innerHTML + `
                    <div class="row mt-2">
                        <div class="col-md-5 ml-2 text-center">
                            <input type="text" class="form-control" name="nombreDetalle[]" value=""></input>
                        </div> 
                        <div class="col-md-5 ml-2 text-center">
                            <input type="text" class="form-control" name="detalle[]"></input>
                        </div>
                        <div class="col-md-1 text-center">
                            <button class="btn btn" onclick="quitarDetalle(this)"  name="filaDetalle[]"><i class="fas fa-trash-alt fa-2x"></i></button>
                        </div>
                    </div>`
}

function quitarDetalle(e){
    
    e.parentElement.parentElement.remove();
    // var x = document.getElementsByName("detalle[]");
    // var i;
    // for (i = 0; i < x.length; i++) {
    //     alert(x[i].value);
    // }
    
}
</script>
@endsection
