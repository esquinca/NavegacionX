<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permitted.profile');
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
    public function show($id)
    {
        //
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
  //public function update(Request $request, $id)
    public function update(Request $request)
    {
      $var_a = $request->inputName;
      $var_b = $request->city;
      if ( !is_null($var_a) && is_null($var_b) )  {
        #cambio todo
        return "#cambio nombre";
      }
      if ( is_null($var_a) && !is_null($var_b) )  {
        #cambio todo
        return "#cambio city";
      }
      if ( !is_null($var_a) && !is_null($var_b) )  {
        #cambio todo
        return "#cambio todo";
      }
    }

    public function updatepass (Request $request)
    {
      $var_a = $request->password;
      $var_b = $request->password_confirmation;
      if ($var_a === $var_b) {
          return "#cambio password";
      }
      else {
          return "#no coinciden password";
      }
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
