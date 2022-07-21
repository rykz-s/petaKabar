<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TabelController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::accept('application/json')->get('https://jsonblob.com/api/998502359789486080');
        $response = $response->json()["data"];
        return view('tabel', compact('response'));
    }
}
