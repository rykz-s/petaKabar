<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PetaController extends Controller
{
    public function getData()
    {
        $response = Http::get('https://01991816-be70-445c-8c17-5c1e2d79c090.mock.pstmn.io/get');
    }

    public function index()
    {
        $response = Http::accept('application/json')->get('https://372bad6f-2a0d-44c3-a50a-f6bd0c8f66bf.mock.pstmn.io/get');
        $response = $response->json()["data"];
        // dd($response["data"]);
        return view('nopane', compact('response'));
    }
}
