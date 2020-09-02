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
      width: 0px;
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
  <body >

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
            <div class="col box-day" onclick="cargarEventos_1()" id="{{ $dayweek['dia']  }}">
              <div>{{ $dayweek['dia']  }}</div>
              
              <!-- evento -->
              @foreach  ($dayweek['evento'] as $event)
                <!-- <script>
                  var a =  {{ $event->fechaIngreso }} - {{ $event->fechaEgres }}
                </script>
                <figcaption id="{{ $event->id }}">{{ $event->fechaIngreso }}</figcaption> -->
                  
                 
                  <a class="badge badge-primary" href="{{ asset('/Evento/details/') }}/{{ $event->id }}">
                  <figcaption>{{ $event->fechaEgreso }}</figcaption> 
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
function cargarEventos(){
  @foreach  ($eventos as $evento)
    //alert ({{$evento->id}});
    var ing =  "{{$evento->fechaIngreso}}"+":00:00:00";
    ing = new Date(ing);
    var year = ing.getFullYear();
    var mes =  ing.getMonth()+1;
     
    var ultimoDiaSemana =ing.getDay()==0 ? 0 : 7-ing.getDay();
    ing = ing.getDate();
    
    ultimoDiaSemana = ultimoDiaSemana + ing;
    var ultimoDiaMes = new Date(year, mes, 0);;
     
    var egr =  "{{$evento->fechaEgreso}}"+":00:00:00";
    egr = new Date(egr);
    egr = egr.getDate();
    var cont = 0;
    var actual=ing;
    //pintar los dias de reserva
    for (actual=ing;actual<=egr;actual++){

    }
    while (actual<=egr && actual<=ultimoDiaSemana && actual<=ultimoDiaMes){
      
          cont ++;
          actual++;
          console.log("cont:" + cont + " act:" + actual + " ing:"+ ing + " egr:" + egr +" semana:" + ultimoDiaSemana+ " mes:" + ultimoDiaMes );
        
    }
    
    ancho = document.getElementById("01").clientWidth * cont + cont; 
    document.getElementById({{$evento->id}}).style.width = ancho;
    if (actual==ultimoDiaSemana){
      ultimoDiaSemana = ultimoDiaSemana + 7;
        
    }
    
  @endforeach
    var node = document.createElement("figcaption");                 
    var textnode = document.createTextNode("Water");         
    node.appendChild(textnode);                              
    document.getElementById("25").appendChild(node);
  }
  function calculaAncho(e){
    if(e<10){
      a="0"+e;
    }else{
      a=e;
    }
    //alert(a);
    //document.getElementById(a).style.backgroundColor = "lightblue";
    
    ancho = document.getElementById(a).clientWidth;
    return ancho;
    //alert(ancho);
    //ancho = ancho * 1;
    //document.getElementById("7").style.width = '800px';
    
  }
function cargarEventos_1(){
  @foreach  ($eventos as $evento)
    var mesCalendario = "{{$data['month']}}";
    var yearCalendario = {{$data['year']}};
    var ing =  "{{$evento->fechaIngreso}}" + ":00:00:00" ;
    ing = new Date(ing);
    var year = ing.getFullYear();
    var mes =  ing.getMonth()+1;
    console.log(mes + " " + mesCalendario);
    var idEvento = {{$evento->id}};
    
    var texto = "{{$evento->titulo}}"; 
    var ultimoDiaSemana = ing.getDay()==0 ? 0 : 7-ing.getDay();
    ingDia = ing.getDate();
    
    ultimoDiaSemana = ultimoDiaSemana + ingDia;
    var ultimoDiaMes = new Date(year, mes, 0);;
     
    var egr =  "{{$evento->fechaEgreso}}"+":00:00:00";
    egr = new Date(egr);
    egrDia = egr.getDate();
    //console.log(ing.getMonth() +" " + egr.getMonth() );
    var pintar;
    var dia;
    var semana;
    if(ing.getMonth()==egr.getMonth()){
      
      if(egrDia<ultimoDiaSemana){ // el ingreso y el etreso estan en la misma semana
        pintar = egrDia-ingDia+1;
        var dia = ingDia;
        agregarTarea(dia,pintar,idEvento,texto);
        
      } else { // el ingreso y el etreso NO estan en la misma semana
        //pinta primera semana
        pintar = ultimoDiaSemana-ingDia+1;
        dia = ingDia;
        semana = 1;
        idEvento = idEvento + "-" + semana;
        agregarTarea(dia,pintar,idEvento,texto);
        ultimoDiaSemana = ultimoDiaSemana + 7;
        primerDiaSemana = ultimoDiaSemana -6;
        while (egrDia>ultimoDiaSemana){
          //pintar semanas del medio
          pintar = ultimoDiaSemana-primerDiaSemana+1;
          dia = primerDiaSemana;
          semana ++;
          idEvento = idEvento + "-" + semana;
          agregarTarea(dia,pintar,idEvento,texto);
          ultimoDiaSemana = ultimoDiaSemana + 7;
          primerDiaSemana = ultimoDiaSemana -6;
        }
        //pintar ultima semana
        pintar = egrDia-primerDiaSemana+1;
        dia = primerDiaSemana;
        semana ++;
        idEvento = idEvento + "-" + semana;
        agregarTarea(dia,pintar,idEvento,texto);

      }
    }


  @endforeach
} 

function  agregarTarea(dia,pintar,idEvento,texto){
    var node = document.createElement("figcaption");
    node.setAttribute("id", idEvento);                 
    var textnode = document.createTextNode(texto);         
    node.appendChild(textnode);
    if(dia<10){dia="0" + dia};
    
    document.getElementById(dia).appendChild(node);
    var ancho = document.getElementById("01").clientWidth * pintar + pintar; 
    document.getElementById(idEvento).style.width = ancho;
} 
</script>
  </body>
</html>
