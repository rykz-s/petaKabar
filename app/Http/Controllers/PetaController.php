<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PetaController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::accept('application/json')->get('http://jsonblob.com/api/1039541677303545856');
        $response = $response->json()["data"];
        return view('nopane', compact('response'));
    }
}
