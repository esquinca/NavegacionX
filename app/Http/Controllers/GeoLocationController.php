<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SimpleXMLElement; 
 
use DomDocument; 
use domXPath; 

class GeoLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permitted.geolocation');
    }

    public function icomeraCurl($key) 
    { 
        $icomera = "https://www.moovmanage.com/public_api/devices?api_key=" . $key; 
 
        $ch = curl_init(); 
        //echo "Inicializa la funcion .. "; 
        curl_setopt($ch, CURLOPT_TIMEOUT, 50); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false ); 
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10 ); 
        curl_setopt($ch, CURLOPT_URL, $icomera); 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json')); 
        curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0"); 
 
 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 10); 
 
        //echo ".. Termina la funcion .."; 
        $output = curl_exec($ch); 
 
        $curlerr = curl_error($ch); 
        $curlerrno = curl_errno($ch); 
        if ($curlerrno != 0) { 
          return "Error en el curl"; 
        }else{ 
 
        } 
        //echo '   Curl error number:  ' . curl_errno($ch) . '|| Curl error message: ' . curl_error($ch); 
        curl_close($ch); 
        $decoded = json_decode($output); 
        $encoded = json_encode($output); 
        return $output; 
        //dd($output); 05183236 
    } 
 
    public function xmlProc() 
    { 
        $device1 = "0a42192efb4d18aea7a9fad2ddd82e4a"; 
        $device2 = "7775834253789cd847242218806a4ec9"; 
        $device3 = "a8d076bad3c753b225381ef9333c9908"; 
        $device4 = "d7abb7a5721f761129edbaa5d1862353"; 
        $device5 = "2ea57b4ca23f2dd5a7a1578935ddec9f"; 
        $device6 = "26ba0e523e10253683dda09af858bc75"; 
        $device7 = "5dd2bf6ad906d05d3151509589521373"; 
        $device8 = "6e406783307d0e6a64d8160ce513fb1f"; 
        $device9 = "c00f4d3a2e8bf5ea1379bb3f2a531715"; 
        $device10 = "718adcc313e41d2c60f752496c02460c"; 
 
        $xmlinfo1 = $this->icomeraCurl($device1); 
        $xmlinfo2 = $this->icomeraCurl($device2); 
        $xmlinfo3 = $this->icomeraCurl($device3); 
        $xmlinfo4 = $this->icomeraCurl($device4); 
        $xmlinfo5 = $this->icomeraCurl($device5); 
        $xmlinfo6 = $this->icomeraCurl($device6); 
        $xmlinfo7 = $this->icomeraCurl($device7); 
        $xmlinfo8 = $this->icomeraCurl($device8); 
        $xmlinfo9 = $this->icomeraCurl($device9); 
        $xmlinfo10 = $this->icomeraCurl($device10); 
 
        $xmlinfo1 = $this->cleanXML($xmlinfo1); 
        $xmlinfo1 = simplexml_load_string($xmlinfo1); 
        $xmlinfo2 = $this->cleanXML($xmlinfo2); 
        $xmlinfo2 = simplexml_load_string($xmlinfo2); 
        $xmlinfo3 = $this->cleanXML($xmlinfo3); 
        $xmlinfo3 = simplexml_load_string($xmlinfo3); 
        $xmlinfo4 = $this->cleanXML($xmlinfo4); 
        $xmlinfo4 = simplexml_load_string($xmlinfo4); 
        $xmlinfo5 = $this->cleanXML($xmlinfo5); 
        $xmlinfo5 = simplexml_load_string($xmlinfo5); 
        $xmlinfo6 = $this->cleanXML($xmlinfo6); 
        $xmlinfo6 = simplexml_load_string($xmlinfo6); 
        $xmlinfo7 = $this->cleanXML($xmlinfo7); 
        $xmlinfo7 = simplexml_load_string($xmlinfo7); 
        $xmlinfo8 = $this->cleanXML($xmlinfo8); 
        $xmlinfo8 = simplexml_load_string($xmlinfo8); 
        $xmlinfo9 = $this->cleanXML($xmlinfo9); 
        $xmlinfo9 = simplexml_load_string($xmlinfo9); 
        $xmlinfo10 = $this->cleanXML($xmlinfo10); 
        $xmlinfo10 = simplexml_load_string($xmlinfo10); 
 
        $jsonxml1 = json_encode($xmlinfo1); 
        $jsonxml2 = json_encode($xmlinfo2); 
        $jsonxml3 = json_encode($xmlinfo3); 
        $jsonxml4 = json_encode($xmlinfo4); 
        $jsonxml5 = json_encode($xmlinfo5); 
        $jsonxml6 = json_encode($xmlinfo6); 
        $jsonxml7 = json_encode($xmlinfo7); 
        $jsonxml8 = json_encode($xmlinfo8); 
        $jsonxml9 = json_encode($xmlinfo9); 
        $jsonxml10 = json_encode($xmlinfo10); 
 
        $jsonjoin = array_merge_recursive(json_decode($jsonxml1, true),json_decode($jsonxml2, true)); 
        $jsonjoin = array_merge_recursive($jsonjoin, json_decode($jsonxml3, true)); 
        $jsonjoin = array_merge_recursive($jsonjoin, json_decode($jsonxml4, true)); 
        $jsonjoin = array_merge_recursive($jsonjoin, json_decode($jsonxml5, true)); 
        $jsonjoin = array_merge_recursive($jsonjoin, json_decode($jsonxml6, true)); 
        $jsonjoin = array_merge_recursive($jsonjoin, json_decode($jsonxml7, true)); 
        $jsonjoin = array_merge_recursive($jsonjoin, json_decode($jsonxml8, true)); 
        $jsonjoin = array_merge_recursive($jsonjoin, json_decode($jsonxml9, true)); 
        $jsonjoin = json_encode(array_merge_recursive($jsonjoin, json_decode($jsonxml10, true))); 
 
        // Contar y revisar si los unio correctamente. 
        //$decode = json_decode($jsonjoin); 
        //$algo = $decode->devices; 
        //$algo = $decode->devices->device[0]->gps_fix->{'@attributes'}->latitude; 
        //dd($algo); 
        return $jsonjoin; 
    } 
 
 
    public function cleanXML($xml) 
    { 
        $xml = str_replace(array("\n", "\r", "\t"), '', $xml); 
        $xml = str_replace('"""', '', $xml); 
        $xml= trim(str_replace('"', "'", $xml)); 
 
        return $xml; 
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
