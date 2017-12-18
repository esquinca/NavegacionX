<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use DB;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permitted.survey');
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
      $date_complete= $request->data;
      $array = explode("-", $date_complete);
      $extraer_year = $array[0];
      $extraer_mes = $array[1];
      $resultados = DB::connection('autobuses')->select('CALL GetNacionalidad(?,?)', array($extraer_year,$extraer_mes));
      return json_encode($resultados);
    }
    public function show_age(Request $request)
    {
      $date_complete= $request->data;
      $array = explode("-", $date_complete);
      $extraer_year = $array[0];
      $extraer_mes = $array[1];
      $resultados = DB::connection('autobuses')->select('CALL GetEdad(?,?)', array($extraer_year,$extraer_mes));
      return json_encode($resultados);
    }
    public function show_tours(Request $request)
    {
      $date_complete= $request->data;
      $array = explode("-", $date_complete);
      $extraer_year = $array[0];
      $extraer_mes = $array[1];
      $resultados = DB::connection('autobuses')->select('CALL GetTours(?,?)', array($extraer_year,$extraer_mes));
      return json_encode($resultados);
    }
    public function show_domains(Request $request)
    {
      $date_complete= $request->data;
      $array = explode("-", $date_complete);
      $extraer_year = $array[0];
      $extraer_mes = $array[1];
      $resultados = DB::connection('autobuses')->select('CALL GetDominio(?,?)', array($extraer_year,$extraer_mes));
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
