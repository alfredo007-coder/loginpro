<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Propiedad;
class ControllerPropiedad extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        $propiedades = Propiedad::where('estado', '=', 1)->get();
      //dd($propiedades);
      
      return view("propiedad/index",compact("propiedades"));
    }

        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $propiedad = Propiedad::all();
        return view("propiedad/create",compact("propiedad"));
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $propiedad = new Propiedad;
        $propiedad->nombre= $request->nombre;
        $propiedad->estado = $request->activo;
        $propiedad->color= $request->selColor;
        $arrDetalles = $request->detalle;
        $arrNombreDetalle = $request->nombreDetalle;
        
        //saco el numero de elementos
        $longitud = count($arrDetalles);
        
        //Recorro todos los elementos
        $cuerpoDetalles = '';
       

        for($i=0; $i<$longitud; $i++){
            $cuerpoDetalles =  $cuerpoDetalles . '"' . $arrNombreDetalle[$i] . '":"' .  $arrDetalles[$i] . '",';
           
        }
        
        $int = strlen ( $cuerpoDetalles ) - 1;
        $cuerpoDetalles = substr($cuerpoDetalles,0,$int);
        $cuerpoDetalles =  '{' . $cuerpoDetalles . '}';
        
        //$cuerpoDetalles = json_encode($cuerpoDetalles, JSON_UNESCAPED_UNICODE);
        $cuerpoDetalles= (utf8_encode($cuerpoDetalles));
       
        $propiedad->detalles = $cuerpoDetalles;
        
        $propiedad->save();
        return redirect('Propiedad');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $propiedad = Propiedad::FindOrFail($id);
        //dd($propiedad);
        return view("propiedad.show", compact("propiedad"));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        dd("hola");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //dd($id);
        $propiedad = Propiedad::find($id);
        $propiedad->nombre= $request->nombre;
        $propiedad->estado = $request->activo;
        $propiedad->color= $request->selColor;
        $arrDetalles = $request->detalle;
        $arrNombreDetalle = $request->nombreDetalle;
        
        //saco el numero de elementos
        $longitud = count($arrDetalles);
        
        //Recorro todos los elementos
        $cuerpoDetalles = '';
       

        for($i=0; $i<$longitud; $i++){
            $cuerpoDetalles =  $cuerpoDetalles . '"' . $arrNombreDetalle[$i] . '":"' .  $arrDetalles[$i] . '",';
           
        }
        
        $int = strlen ( $cuerpoDetalles ) - 1;
        $cuerpoDetalles = substr($cuerpoDetalles,0,$int);
        $cuerpoDetalles =  '{' . $cuerpoDetalles . '}';
        
        //$cuerpoDetalles = json_encode($cuerpoDetalles, JSON_UNESCAPED_UNICODE);
        $cuerpoDetalles= (utf8_encode($cuerpoDetalles));
       
        $propiedad->detalles = $cuerpoDetalles;
        
        $propiedad->save();
        return redirect('Propiedad');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
