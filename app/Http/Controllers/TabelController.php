<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TabelController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::accept('application/json')->get('https://f1f8ff16-4f2d-48e6-a9cc-d2a941058e62.mock.pstmn.io/get');
        if (request('kategori')) {
            $response->where('name', 'Like', '%' . request('kategori') . '%');
        }
        $response = $response->json()["data"];
        // dd($response);
        return view('tabel', compact('response'));
    }
}
