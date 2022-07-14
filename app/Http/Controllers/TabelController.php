<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TabelController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::accept('application/json')->get('https://e85fa493-3d3b-4c85-bafc-8365bf6ce3c9.mock.pstmn.io/get');
        $response = $response->json()["data"];
        return view('tabel', compact('response'));
    }
}
