<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DataConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listarunidad = DB::connection('autobuses')->table('ListarDevices')->get();
        return view('permitted.consumption', compact('listarunidad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      $date_unitys= $request->data_unity;
      $date_complete= $request->data;
      $array = explode("-", $date_complete);
      $extraer_year = $array[0];
      $extraer_mes = $array[1];
      $resultados = DB::connection('autobuses')->select('CALL GetConsumoUnidad(?,?,?)', array($extraer_year,$extraer_mes, $date_unitys));
      return json_encode($resultados);
    }
    public function show_top(Request $request)
    {
      $date_complete= $request->data;
      $array = explode("-", $date_complete);
      $extraer_year = $array[0];
      $extraer_mes = $array[1];
      $resultados = DB::connection('autobuses')->select('CALL GetTop5Consumo(?,?)', array($extraer_year,$extraer_mes));
      return json_encode($resultados);
    }

    public function show_day(Request $request)
    {
      $date_complete= $request->data;
      $resultados = DB::connection('autobuses')->select('CALL GetTop10ConsumoDiario(?)', array($date_complete));
      return json_encode($resultados);
    }
    public function show_month_up(Request $request)
    {
      $date_complete= $request->data;
      $array = explode("-", $date_complete);
      $extraer_year = $array[0];
      $extraer_mes = $array[1];
      $resultados = DB::connection('autobuses')->select('CALL TablaConsumoUp_2(?,?)', array($extraer_year,$extraer_mes));
      return json_encode($resultados);
    }
    public function show_month_down(Request $request)
    {
      $date_complete= $request->data;
      $array = explode("-", $date_complete);
      $extraer_year = $array[0];
      $extraer_mes = $array[1];
      $resultados = DB::connection('autobuses')->select('CALL TablaConsumoDown_2(?,?)', array($extraer_year,$extraer_mes));
      return json_encode($resultados);
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
