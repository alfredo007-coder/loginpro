<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Propiedad;
use DateTime;
use Illuminate\Support\Facades\DB;

class ControllerEvent extends Controller
{
    //
    public function form(){
      $propiedades = Propiedad::where('estado', 1)
               ->get();
      //dd($propiedades);
      return view("evento/form",compact("propiedades"));
    }

    public function create(Request $request){
      
      $this->validate($request, [
      'fechaIngreso'    =>  'required',
      'fechaEgreso'     =>  'required',
      'propiedadId'     =>  'required', 
      'nombre'          =>  'required',
      'email'           =>  'required',
      'wapp1'           =>  'required',
      'wapp2'           =>  'required',
      'cantPersonas'    =>  'required',
      'lugarResidencia' =>  'required'

     ]);
        // validar que no se superpongan
        $idPropiedad = $request->input("propiedadId");
        $eventos = DB::table('evento')
        ->where('idPropiedad', $idPropiedad)
          ->get();

        foreach ($eventos as $evento)
        {
           $Ingreso = $request->input("fechaIngreso");
           $Egreso = $request->input("fechaEgreso");
           if (($evento->fechaIngreso <= $Ingreso && $Ingreso < $evento->fechaEgreso)||($evento->fechaIngreso < $Egreso && $Egreso < $evento->fechaEgreso)){
            return back()->with('error', 'Reserva solapada verifique las fechas');
           }
           
        }


      Event::insert([
        
        'fechaIngreso' => $request->input("fechaIngreso"),
        'fechaEgreso'  => $request->input("fechaEgreso"),
        'idPropiedad'  => $request->input("propiedadId"),
        'nombre'       => $request->input("nombre"),
        'email'        => $request->input("email"),
        'wapp1'        => $request->input("wapp1"),
        'wapp2'        => $request->input("wapp2"),
        'cantPersonas' => $request->input("cantPersonas"),
        'lugarResidencia'=> $request->input("lugarResidencia")

      ]);

      //return back()->with('success', 'Reserva generada exitosamente!');
      return redirect("Evento/index");  
    }
    public function confirmar($id){
      //$event = Event::find($id);
      $event= DB::table('evento')
      ->select('evento.*','propiedad.nombre as propiedad', 'evento.id as id')
      ->join('propiedad', 'propiedad.id', '=', 'evento.idPropiedad')
      ->where('evento.estado',1)
      ->where('evento.id',$id)
      ->get();

      //dd($event[0]);
      return view("evento/confirmar",[
        "event" => $event[0]
      ]);

      
        
    }
    public function actualizar(Request $request){
      //dd($request->input("id"));
      //dd($request->input("comentarios"));
      
      Event::findOrFail($request->input("id"))->update([
        'estado'     => 2,
        'comentarios'=> $request->input("comentarios"),
        ]);
        return redirect("Evento/index"); 
    }
    public function details($id){

      $event = Event::find($id);

      return view("evento/evento",[
        "event" => $event
      ]);

    }


    // =================== CALENDARIO =====================


    public function index(){
      
       $month = date("Y-m");
       $mesActual = date("n");
       //dd($mesActual);
       //
       $data = $this->calendar_month($month);
       $mes = $data['month'];
       // obtener mes en espanol
       $mespanish = $this->spanish_month($mes);
       $mes = $data['month'];
       
       $fechaDesde = new DateTime();
       $fechaDesde->modify('first day of this month');
       $fechaHasta = new DateTime();
       $fechaHasta->modify('last day of this month');
       
       $eventos= DB::table('evento')
              ->select('evento.*','propiedad.*','evento.nombre as nombreEvento', 'evento.id as id')
              ->join('propiedad', 'propiedad.id', '=', 'evento.idPropiedad')
              ->where('evento.estado',1)
              ->where(function($query) use($mesActual,$fechaDesde,$fechaHasta){
                $query->whereMonth('FechaIngreso',$mesActual)
                ->orwhereMonth('FechaEgreso',$mesActual)
                ->orwhere(function($query) use($fechaDesde,$fechaHasta){
                  $query->whereDate('FechaIngreso', '<', $fechaDesde)
                        ->whereDate('FechaEgreso', '>', $fechaHasta);
                  });
              })
              ->get();
              
       return view("evento/calendario",[
         'data' => $data,
         'mes' => $mes,
         'mespanish' => $mespanish,
         'eventos' => $eventos
       ]);

   }

   public function index_month($month){
     
      
      $mesActual = new DateTime($month);
      
      $mesActual = $mesActual->format('n');
      $data = $this->calendar_month($month);
      
      $mes = $data['month'];
      //dd($mesActual);
      // obtener mes en espanol
      $mespanish = $this->spanish_month($mes);
      $mes = $data['month'];
      $fechaDesde = new DateTime();
       $fechaDesde->modify('first day of this month');
       $fechaHasta = new DateTime();
       $fechaHasta->modify('last day of this month');
       
       $eventos= DB::table('evento')
              ->select('evento.*','propiedad.*','evento.nombre as nombreEvento', 'evento.id as id')
              ->join('propiedad', 'propiedad.id', '=', 'evento.idPropiedad')
              ->where('evento.estado',1)
              ->where(function($query) use($mesActual,$fechaDesde,$fechaHasta){
                $query->whereMonth('FechaIngreso',$mesActual)
                ->orwhereMonth('FechaEgreso',$mesActual)
                ->orwhere(function($query) use($fechaDesde,$fechaHasta){
                  $query->whereDate('FechaIngreso', '<', $fechaDesde)
                        ->whereDate('FechaEgreso', '>', $fechaHasta);
                  });
              })
              ->get();
      
      return view("evento/calendario",[
        'data' => $data,
        'mes' => $mes,
        'mespanish' => $mespanish,
        'eventos' => $eventos
      ]);

    }

    public static function calendar_month($month){
      //$mes = date("Y-m");
      $mes = $month;
      
      //sacar el ultimo de dia del mes
      $daylast =  date("Y-m-d", strtotime("last day of ".$mes));
      
      //sacar el dia de dia del mes
      $fecha      =  date("Y-m-d", strtotime("first day of ".$mes));
      $daysmonth  =  date("d", strtotime($fecha))+ 0;
      $montmonth  =  date("m", strtotime($fecha))+ 0;
      $yearmonth  =  date("Y", strtotime($fecha))+ 0;
      
      // sacar el lunes de la primera semana
     
      $nuevaFecha = mktime(0,0,0,$montmonth,$daysmonth,$yearmonth);
      
      $diaDeLaSemana = date("w", $nuevaFecha);
      if ($diaDeLaSemana==0){
        $diaDeLaSemana=7;
      }
      //dd($montmonth." ".$daysmonth." ".$yearmonth."-DS-".$diaDeLaSemana);
      $nuevaFecha = $nuevaFecha - ($diaDeLaSemana*24*3600); //Restar los segundos totales de los dias transcurridos de la semana
      
      
      $dateini = date ("Y-m-d",$nuevaFecha);
  
      //dd($dateini);
      //$dateini = date("Y-m-d",strtotime($dateini."+ 1 day"));
      // numero de primer semana del mes
      
      $semana1 = date("W",strtotime($fecha));
  
      // numero de ultima semana del mes
      $semana2 = date("W",strtotime($daylast));
      //dd($daylast);
      if ($semana1>$semana2){
        $semana2++;
        $semana1=1; // esto es porque puede caer en enero 

      } 
      // semana todal del mes
      // en caso si es diciembre
      if (date("m", strtotime($mes))==12) {
          $semana = 5;
      }
      else {
        $semana = ($semana2-$semana1)+1;
        
      }
      // semana todal del mes
      $datafecha = $dateini;
      $calendario = array();
      $iweek = 0;
      while ($iweek < $semana):
          $iweek++;
          //echo "Semana $iweek <br>";
          //
          $weekdata = [];
          for ($iday=0; $iday < 7 ; $iday++){
            // code...
            //dd($datafecha);
            
            $datafecha = date("Y-m-d",strtotime($datafecha."+ 1 day"));
            //$datafecha = date("Y-m-d",strtotime($datafecha));
            $datanew['mes'] = date("M", strtotime($datafecha));
            $datanew['dia'] = date("d", strtotime($datafecha));
            $datanew['fecha'] = $datafecha;
            //AGREGAR CONSULTAS EVENTO
            $datanew['evento'] = Event::where("fechaIngreso",$datafecha)->get();

            array_push($weekdata,$datanew);
          }
          $dataweek['semana'] = $iweek;
          $dataweek['datos'] = $weekdata;
          
          //$datafecha['horario'] = $datahorario;
          array_push($calendario,$dataweek);
          
      endwhile;
      $nextmonth = date("Y-M",strtotime($mes."+ 1 month"));
      $lastmonth = date("Y-M",strtotime($mes."- 1 month"));
      $month = date("M",strtotime($mes));
      $yearmonth = date("Y",strtotime($mes));
      
      
      $data = array(
        'next'      => $nextmonth,
        'month'     => $month,
        'year'      => $yearmonth,
        'last'      => $lastmonth,
        'calendar'  => $calendario,
      );
      return $data;
    }

    public static function spanish_month($month)
    {

        $mes = $month;
        if ($month=="Jan") {
          $mes = "Enero";
        }
        elseif ($month=="Feb")  {
          $mes = "Febrero";
        }
        elseif ($month=="Mar")  {
          $mes = "Marzo";
        }
        elseif ($month=="Apr") {
          $mes = "Abril";
        }
        elseif ($month=="May") {
          $mes = "Mayo";
        }
        elseif ($month=="Jun") {
          $mes = "Junio";
        }
        elseif ($month=="Jul") {
          $mes = "Julio";
        }
        elseif ($month=="Aug") {
          $mes = "Agosto";
        }
        elseif ($month=="Sep") {
          $mes = "Septiembre";
        }
        elseif ($month=="Oct") {
          $mes = "Octubre";
        }
        elseif ($month=="Oct") {
          $mes = "December";
        }
        elseif ($month=="Dec") {
          $mes = "Diciembre";
        }
        else {
          $mes = $month;
        }
        return $mes;
    }

}
