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
    <div class="card">
      <div class="card-header">
            <div style="height:50px"></div>
            <h1></h1>
            <p class="lead">
            <h3>Evento</h3>
            <p>Formulario de evento</p>
            <a class="btn btn-default"  href="{{ asset('/Evento/index') }}">Atras</a>
            <hr>

            @if (count($errors) > 0)
              <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert">×</button>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
              </div>
            @endif
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
              <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
        
      </div> <!--Header-->
        <div class="card-body">Content</div>
          <div class="row">
              <div class="col-md-12">
                <form action="{{ asset('/Evento/create/') }}" method="post">
                  @csrf
                <div class="card ml-2 mr-2">
                  <div class="row">
                    
                    <div class="col-md-3" >
                        <div class="fomr-group">
                          <label>Titulo</label>
                          <input type="text" class="form-control" name="titulo">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="fomr-group">
                          <label>Descripcion del Evento</label>
                          <input type="text" class="form-control" name="descripcion">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="fomr-group">
                          <label>Fecha de Ingreso</label>
                          <input type="date" class="form-control" name="fechaIngreso">
                        </div>
                      </div>
                      <div class="col-md-3 mr-1">
                        <div class="fomr-group">
                          <label>Fecha de Egreso</label>
                          <input type="date" class="form-control" name="fechaEgreso">
                        </div>
                      </div>  
                  </div>
                  </div>
                  <div class="fomr-group">
                    <label>Fecha de Ingreso</label>
                    <input type="date" class="form-control" name="fechaIngreso">
                  </div>
                  <div class="fomr-group">
                    <label>Fecha de Egreso</label>
                    <input type="date" class="form-control" name="fechaEgreso">
                  </div>
                  
                  <div class="form-group">
                    <label for="sel1">Seleccione la propiedad:</label>
                    <select class="form-control" id="sel1">
                      @foreach ($propiedades as $propiedad)
                      <option value="{{$propiedad->id}}">{{$propiedad->nombre}}</option>
                      @endforeach
                    </select>            
                    
                  
                    
                  </div>
                  <br>
                  <input type="submit" class="btn btn-info" value="Guardar">
                </form>
              </div>
          </div>
        </div>

      <!-- inicio de semana -->

    </div>
    </div> <!-- /container -->

    <!-- Footer -->
  </divo>
<footer class="page-footer font-small blue pt-4">
 

</footer>
<!-- Footer -->

  </body>
</html>