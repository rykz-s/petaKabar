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
        $response = Http::accept('application/json')->get('https://57920896-8e3b-4335-bb9f-962fb4e9584d.mock.pstmn.io/get');
        $response = $response->json()["data"];
        // dd($response["data"]);
        return view('nopane', compact('response'));
    }
}
