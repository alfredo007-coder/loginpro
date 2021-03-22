

 <html>
  <head>
    <title></title>
    <meta content="">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <style>
    body{
      font-family: 'Exo', sans-serif;
    }
    .header-col{
      background: #E3E9E5;
      color:#536170;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
    .header-calendar{
      background: #EE192D;color:white;
    }
    .box-day{
      border:1px solid #E3E9E5;
      height:150px;
    }
    .box-dayoff{
      border:1px solid #E3E9E5;
      height:150px;
      background-color: #ccd1ce;
    }
    </style>

  </head>
  @extends('layouts.app')

@section('content')
  <body onload="funcion_inicial()">
    <div class="row mb-2 mt-5"> <!--Marco General-->
      <div class="container">
      @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
      @endif
        <form action="{{ asset('/Evento/actualizar/') }}" id="fomularioActualizarEvento" method="post">
                  @csrf  
                 
          <div class="card">
            <div class="card-header"> <!--header-->
              <div class="row">
                <div class="col-md-3">
                    <div class="fomr-group">
                      <label>Fecha de Ingreso</label>
                      <input type="date" class="form-control" name="fechaIngreso"  id="fechaIngreso" value="{{$event->fechaIngreso}}" disabled required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="fomr-group">
                      <label>Fecha de Egreso</label>
                      <input type="date" class="form-control" name="fechaEgreso" id="fechaEgreso" value="{{$event->fechaEgreso}}" disabled required>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="fomr-group">
                      <label for="sel1">Propiedad:</label>
                      <select class="form-control" name="propiedad" id="sel_propiedad" required="required" disabled>
                        <option selected disabled>{{$event->propiedad}}</option>
                        
                      </select>
                      <input type="text" class="form-control" name="propiedadId" id="propiedadId" style="display:none">  
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="fomr-group">
                        <div class="form-check form-switch">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Confirmado</label>
                            <input class="form-control" name="btn_estado" type="checkbox" id="flexSwitchCheckDefault" />
                           
                        </div>    
                    </div>
                  </div>      
              </div>     
            </div> <!--Header-->
            
            <div class="card-body" id="conf"> 
            
              <div class="row">
                  <div class="col-md-4" >
                    <div class="fomr-group">
                      <p class="font-weight-bold">Nombre</p>
                      <input type="text" class="form-control" name="nombre" value="{{$event->nombre}}" disabled required>
                    </div>
                  </div>
                  <div class="col-md-8" >
                    <div class="fomr-group">
                      <label for="email"><p class="font-weight-bold">Email</p></label>
                      <input type="email" class="form-control" name="email" placeholder="Ingrese su email" id="email" value="{{$event->email}}" disabled required>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-2" >
                    <div class="fomr-group">
                      <p class="font-weight-bold">Cel/Wapp</p>
                      <input type="tel" pattern="[0-9]{10}" class="form-control" name="wapp1" value="{{$event->wapp1}}" disabled required>
                    </div>
                  </div>
                  <div class="col-md-2" >
                    <div class="fomr-group">
                        <p class="font-weight-bold">Cel Alternativo</p>  
                        <input type="text" pattern="[0-9]{10}" class="form-control" name="wapp2" value="{{$event->wapp2}}" disabled required>
                    </div>
                  </div>
                  <div class="col-md-2" >
                    <div class="fomr-group">
                      <p class="font-weight-bold">Cant. Personas <p>
                      <input type="number" min="1" class="form-control" name="cantPersonas" id="cantPersonas" value="{{$event->cantPersonas}}" disabled required>
                    </div>
                  </div>
                  <div class="col-md-6" >
                    <div class="fomr-group">
                      <p class="font-weight-bold">Lugar de Residencia</p>
                      <input type="text" class="form-control" name="lugarResidencia" value="{{$event->lugarResidencia}}" disabled required>
                    </div>
                  </div>                
              </div>
              <div class="row">
                <div class="col-md-12 mt-3" >
                    <div class="fomr-group">
                      <p class="font-weight-bold" style="text-shadow: 3px 3px 3px white;">Cometarios</p>
                      <input type="text" class="form-control" name="comentarios" value="{{$event->comentarios}}"  required>
                      <input type="hidden" class="form-control" name="id"  value="{{$event->id}}" required>
                    </div>
                </div>
            </div>
            
              <div class="text-right">
                <div class="btn-group mt-3" >
                  <input type="submit" id="btn_conf" class="btn btn-info"  value="Guardar">
                  <input type="button"  class="btn btn-warning" onclick="volver()" value="Volver">
                </div>
              </div>
              
            </div> <!-- card -->
        </form>
      </div> <!-- /container -->
    </div>
    <footer class="page-footer font-small blue pt-4">
    </footer>
    <!-- Footer -->
  </body>
  @endsection
</html>
<script>
function funcion_inicial(){
    
                if ({{$event->estado}}==2) {
                    document.getElementById("conf").style ="background-image: url('{{ asset('img/confirmado.jpg') }}'); background-size: cover;";
                    document.getElementById("flexSwitchCheckDefault").checked = true;
                }
            

}

function volver(){
       window.location.href = "{{ asset('/Evento/index') }}";
}
</script>
