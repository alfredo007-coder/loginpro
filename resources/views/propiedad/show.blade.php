@extends('layouts.app')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
@section('content')

<form method="post" action="store">
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
                                    <input type="text" class="form-control" name="nombre" id="txtNombre" value="{{$propiedad->nombre}}" style="backgroundColor:{{$propiedad->color}};" ></input>
                                    {{csrf_field()}}
                                </div>  
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                Activo
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value={{$propiedad->estado}} id="defaultCheck2" name="activo" required @if($propiedad->estado==1) checked @endif>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                Color
                                </div>
                                <div class="form-group">
                                    <select class="browser-default custom-select" type="select" name="selColor" onchange="objetoSeleccionado()" id="selColor" required> 
                                        <option value="">elija un color</option>
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
                        <h2> Detalles <button class="btn btn-success" onclick="agregarDetalle()"><i class="far fa-plus-circle "></i></button></h2>
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
                                <input type="text" class="form-control" name="nombreDetalle[]" value="Plazas" ></input>
                            </div> 
                            <div class="col-md-5 ml-2 text-center">
                                <script>
                                    var s = '{{$propiedad->detalles}}';
                                    //s=JSON.parse(s);
                                    console.log(s);
                                    
                                </script>
                                <input type="number" class="form-control" name="detalle[]" value="2"></input>
                            </div>
                            <div class="col-md-1 text-center">
                                <button class="btn btn" onclick="quitarDetalle()" disabled><i class="fas fa-trash-alt fa-2x"></i></button>
                            </div>
                        </div> 
                    </div> <!-- fin body-->
                </div>
                <div class="col-md-12 text-right mt-2">
                    <button type="submit" class="btn btn-success" onclick="guardar()">Guardar <i class="fas fa-share"></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
function objetoSeleccionado(){
    var color = document.getElementById("selColor");
    color.style.backgroundColor = color.value;
    document.getElementById("txtNombre").style.backgroundColor = color.value;
}
function agregarDetalle(){
    
    var objeto = document.getElementById("fila");
    objeto.innerHTML = objeto.innerHTML + `
                    <div class="row mt-2">
                        <div class="col-md-5 ml-2 text-center">
                            <input type="text" class="form-control" name="nombreDetalle[]" value="" required></input>
                        </div> 
                        <div class="col-md-5 ml-2 text-center">
                            <input type="text" class="form-control" name="detalle[]" required></input>
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
function guardar(){
   // var sel = document.getElementById("selColor");
    
    
}
</script>
@endsection
