<html>
  <head>
    <title></title>
    <meta content="">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
    body{
      font-family: 'Exo', sans-serif;
    }
    figcaption {
      background-color: black;
      color: orange;
      font-style: italic;
      padding: 2px;
      position: absolute;
      width: 150px;
      left: 0px;
      text-align: center;
      white-space: nowrap;
      text-overflow: ellipsis;
      display: block;
      overflow: hidden
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

    <div class="container">
      <div style="height:50px"></div>
      <h1>Reserva</h1>
      <p class="lead">
      <h3>Calendario - evento</h3>
      <a class="btn btn-default"  href="{{ asset('/Evento/form') }}">Crear un evento</a>


      <hr>

      <div class="row header-calendar"  >

        <div class="col" style="display: flex; justify-content: space-between; padding: 10px;">
          <a  href="{{ asset('/Calendar/event/') }}/<?= $data['last']; ?>" style="margin:10px;">
            <i class="fas fa-chevron-circle-left" style="font-size:30px;color:white;"></i>
          </a>
          <h2 style="font-weight:bold;margin:10px;"><?= $mespanish; ?> <small><?= $data['year']; ?></small></h2>
          <a  href="{{ asset('/Calendar/event/') }}/<?= $data['next']; ?>" style="margin:10px;">
            <i class="fas fa-chevron-circle-right" style="font-size:30px;color:white;"></i>
          </a>
        </div>

      </div>
      <div class="row">
        <div class="col header-col">Lunes</div>
        <div class="col header-col">Martes</div>
        <div class="col header-col">Miercoles</div>
        <div class="col header-col">Jueves</div>
        <div class="col header-col">Viernes</div>
        <div class="col header-col">Sabado</div>
        <div class="col header-col">Domingo</div>
       
      </div>
      <!-- inicio de semana -->
      @foreach ($data['calendar'] as $weekdata)
      
        <div class="row">
          <!-- ciclo de dia por semana -->
          @foreach  ($weekdata['datos'] as $dayweek)
          
          @if  ($dayweek['mes']==$mes)
            <div class="col box-day" onclick="ver({{ $dayweek['dia']  }})" id="{{ $dayweek['dia']  }}">
              <div>{{ $dayweek['dia']  }}</div>
              
              <!-- evento -->
              @foreach  ($dayweek['evento'] as $event)
                <!-- <script>
                  var a =  {{ $event->fechaIngreso }} - {{ $event->fechaEgres }}
                </script>
                <figcaption id="{{ $event->id }}">{{ $event->fechaIngreso }}</figcaption> -->
                  
                  
                  <a class="badge badge-primary" href="{{ asset('/Evento/details/') }}/{{ $event->id }}">
                    <figcaption id="{{ $event->id }}">{{ $event->fechaIngreso }}</figcaption>
                  </a>
              @endforeach
            </div>
          @else
          <div class="col box-dayoff">
          </div>
          @endif


          @endforeach
        </div>
      @endforeach

    </div> <!-- /container -->

    <!-- Footer -->
<footer class="page-footer font-small blue pt-4">
 

</footer>
<!-- Footer -->
<script>
  function ver(e){
    if(e<10){
      a="0"+e;
    }else{
      a=e;
    }
    //alert(a);
    //document.getElementById(a).style.backgroundColor = "lightblue";
    
    ancho = document.getElementById(a).clientWidth;
    //alert(ancho);
    ancho = ancho * 1;
    document.getElementById("7").style.width = ancho;
    
  }
</script>
  </body>
</html>
