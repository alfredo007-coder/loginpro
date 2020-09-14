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
      
      color: black;
      font-style: italic;
      border-radius: 15px;
      margin-top:1.1em;
      position: absolute;
      width: 0px;
      left: 0px;
      padding: 0px;
      text-align: center;
      white-space: nowrap;
      text-overflow: ellipsis;
      display: block;
      overflow: hidden
    }
    .header-col{
      background: #22c1c3;
      color:#080894;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
    }
    .header-calendar{
      background: rgb(2,0,36);
      background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(8,8,148,0.9755252442773985) 22%, rgba(0,212,255,1) 100%);
      color:black;
     
    
      
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

    .cabecera{
    position: -webkit-sticky; /* Safari */
    position: sticky; z-index: 3; 
    opacity:0.9;
    top: 0;
    }
    </style>

  </head>
  <body onload="cargarEventos();">

    <div class="container">
      <div style="height:50px"></div>
      <h1>Reserva</h1>
      <p class="lead">
      <h3>Calendario - evento</h3>
      <a class="btn btn-default"  href="{{ asset('/Evento/form') }}">Crear un evento</a>


      <hr>
      <div class="cabecera">
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
      <!-- inicio de semana -->
      @foreach ($data['calendar'] as $weekdata)
      
        <div class="row">
          <!-- ciclo de dia por semana -->
          @foreach  ($weekdata['datos'] as $dayweek)
          
          @if  ($dayweek['mes']==$mes)
            <div class="col box-day" id="{{ $dayweek['dia']  }}">
              <div>{{ $dayweek['dia']  }}</div>
              
              <!-- evento -->
              @foreach  ($dayweek['evento'] as $event)
                <!-- <script>
                  var a =  {{ $event->fechaIngreso }} - {{ $event->fechaEgres }}
                </script>
                <figcaption id="{{ $event->id }}">{{ $event->fechaIngreso }}</figcaption> -->
                  
                 
                  
                  
                    
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
  var altura=-20;
  @foreach  ($eventos as $evento)
    altura = altura + 25;
    var mesCalendario = "{{$data['month']}}";
    var yearCalendario = {{$data['year']}};
    var primerDiaMes = new Date(yearCalendario  + "-" + mesCalendario + "-" + "1" + ":00:00:00");
    var ing =  "{{$evento->fechaIngreso}}" + ":00:00:00";
    ing = new Date(ing);
    
    
    ing = (primerDiaMes>ing)?primerDiaMes:ing; 
    var year = ing.getFullYear();
    var mes =  ing.getMonth()+1;
    
    var idEvento = {{$evento->id}};
    var texto = "{{$evento->nombre}}" + "*{{$evento->fechaIngreso}}* " + " *{{$evento->fechaEgreso}}*"; 
    var ultimoDiaSemana = ing.getDay()==0 ? 0 : 7-ing.getDay();
    ingDia = ing.getDate();
    
    ultimoDiaSemana = ultimoDiaSemana + ingDia;
    var ultimoDiaMes = new Date(year, mes, 0);;
     
    var egr =  "{{$evento->fechaEgreso}}"+":00:00:00";
    egr = new Date(egr);
    
    var ultimoDiaMes =   new Date(yearCalendario  + "-" + mesCalendario + "-" + "1");
    ultimoDiaMes = new Date(ultimoDiaMes.getFullYear() , ultimoDiaMes.getMonth() + 1, 0); 
    
    egr=(ultimoDiaMes<egr)?ultimoDiaMes:egr;
    

    egrDia = egr.getDate();
    //console.log(ing.getMonth() +" " + egr.getMonth() );
    var pintar;
    var dia;
    var semana;
    var color = "{{$evento->color}}";
    if(ing.getMonth()==egr.getMonth()){
      
      if(egrDia<ultimoDiaSemana){ // el ingreso y el egreso estan en la misma semana
        pintar = egrDia-ingDia+1;
        var dia = ingDia;
        agregarTarea(dia,pintar,idEvento,texto,altura,color);
        
      } else { // el ingreso y el etreso NO estan en la misma semana
        //pinta primera semana
        pintar = ultimoDiaSemana-ingDia+1;
        dia = ingDia;
        semana = 1;
        idEvento = idEvento + "-" + semana;
        agregarTarea(dia,pintar,idEvento,texto,altura,color);
        ultimoDiaSemana = ultimoDiaSemana + 7;
        primerDiaSemana = ultimoDiaSemana -6;
        while (egrDia>ultimoDiaSemana){
          //pintar semanas del medio
          pintar = ultimoDiaSemana-primerDiaSemana+1;
          dia = primerDiaSemana;
          semana ++;
          idEvento = idEvento + "-" + semana;
          agregarTarea(dia,pintar,idEvento,texto,altura,color);
          ultimoDiaSemana = ultimoDiaSemana + 7;
          primerDiaSemana = ultimoDiaSemana -6;
        }
        //pintar ultima semana
        pintar = egrDia-primerDiaSemana+1;
        dia = primerDiaSemana;
        semana ++;
        idEvento = idEvento + "-" + semana;
        agregarTarea(dia,pintar,idEvento,texto,altura,color);

      }
    }


  @endforeach
} 

function  agregarTarea(dia,pintar,idEvento,texto,altura,color){
    //console.log(color);
    
    var node = document.createElement("figcaption");
    node.setAttribute("id", idEvento);                 
    var textnode = document.createTextNode(texto);         
    node.appendChild(textnode);
    if(dia<10){dia="0" + dia};
    document.getElementById(dia).appendChild(node);
    var ancho = document.getElementById("01").clientWidth * pintar + pintar; 
    document.getElementById(idEvento).style.width = ancho;
    document.getElementById(idEvento).style.top = altura;
    document.getElementById(idEvento).style.backgroundColor = color;

} 
</script>
  </body>
</html>
