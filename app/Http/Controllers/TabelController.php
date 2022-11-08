<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TabelController extends Controller
{
    public function index(Request $request)
    {
        $tipe_daerah = ['kabupaten', 'kecamatan', 'provinsi'];
        $tipe = $request->query('tipe');
        $daerah = $request->query('daerah');
        $kategori = $request->query('kategori');

        $response = Http::accept('application/json')->get('http://jsonblob.com/api/1039541677303545856');
        $response = $response->json()["data"];
        $data = [];
        if ($tipe != 'all' && in_array($tipe, $tipe_daerah)) {
            for ($i=0; $i < count($response); $i++) {
                if(strtolower($response[$i][$tipe]) == strtolower($daerah) && strtolower($response[$i]['kategori']) == strtolower($kategori)){
                    array_push($data, $response[$i]);
                }
            }
        } elseif ($tipe == ''){
            $data = $response;
        } 
        return view('tabel', compact('data'));
    }
}
