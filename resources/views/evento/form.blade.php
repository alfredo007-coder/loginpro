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
  <body>
    <div class="row mb-2 mt-5"> <!--Marco General-->
      <div class="container">
        <form action="{{ asset('/Evento/create/') }}" method="post">
                  @csrf  
          <div class="card">
            <div class="card-header"> <!--header-->
              <div class="row">
                <div class="col-md-3">
                    <div class="fomr-group">
                      <label>Fecha de Ingreso</label>
                      <input type="date" class="form-control" name="fechaIngreso" required>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="fomr-group">
                      <label>Fecha de Egreso</label>
                      <input type="date" class="form-control" name="fechaEgreso" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="fomr-group">
                      <label for="sel1">Seleccione la propiedad:</label>
                      <select class="form-control" id="sel_propiedad" required="required">
                        <option selected disabled>Seleccione aqui</option>
                        @foreach ($propiedades as $propiedad)
                        <option value="{{$propiedad}}">{{$propiedad->nombre}}</option>
                        @endforeach
                      </select>  
                    </div>
                  </div>    
              </div>     
            </div> <!--Header-->
            <div class="card-body">
              <div class="row">
                <div class="col-md-4" >
                    <div class="fomr-group">
                      <label>Nombre</label>
                      <input type="text" class="form-control" name="titulo"required>
                    </div>
                  </div>
                  <div class="col-md-8" >
                    <div class="fomr-group">
                      <label for="email">Email</label>
                      <input type="email" class="form-control" placeholder="Ingrese su email" id="email" required>
                    </div>
                  </div>
                </div>
                <div class="row mt-2">
                  <div class="col-md-2" >
                    <div class="fomr-group">
                      <label>Cel/Wapp</label>
                      <input type="text" class="form-control" name="titulo" required>
                    </div>
                  </div>
                  <div class="col-md-2" >
                    <div class="fomr-group">
                      <label>Cel Alternativo</label>
                      <input type="text" class="form-control" name="titulo" required>
                    </div>
                  </div>
                  <div class="col-md-2" >
                    <div class="fomr-group">
                      <label>Cant. Personas</label>
                      <input type="number" class="form-control" name="titulo" required>
                    </div>
                  </div>
                  <div class="col-md-6" >
                    <div class="fomr-group">
                      <label>Lugar de Residencia</label>
                      <input type="text" class="form-control" name="titulo" required>
                    </div>
                  </div>                
              </div>
            </div> <!--car-body-->
          </div> <!-- card -->
          <div class="col text-right mt-2">
            <input type="submit" class="btn btn-info" onclick="guardar()" value="Guardar">
          </div>
        </form>
      </div> <!-- /container -->
    </div>
    <footer class="page-footer font-small blue pt-4">
    </footer>
    <!-- Footer -->
  </body>
</html>
<script>
  function guardar(){
    
    var cab = document.getElementById("sel_propiedad").value;
    console.log(cab);
    alert(cab.id);
  }
</script>