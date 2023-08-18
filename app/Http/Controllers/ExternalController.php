<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalController extends Controller
{
    public function provinceExternal()
    {
        $curlprov = curl_init();
        curl_setopt_array($curlprov, [
            CURLOPT_URL => "http://www.emsifa.com/api-wilayah-indonesia/api/provinces.json",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            )
        ]);
        $responseprov = curl_exec($curlprov);
        curl_close($curlprov);
        $dprovinsi = json_decode($responseprov);
        dd($dprovinsi);
    }
}
