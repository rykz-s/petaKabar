<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TabelController extends Controller
{
    public function index(Request $request)
    {
        $response = Http::accept('application/json')->get('https://787ad203-77dc-49de-9f3c-e6ad11e820b9.mock.pstmn.io/get');
        if (request('kategori')) {
            $response->where('name', 'Like', '%' . request('kategori') . '%');
        }
        $response = $response->json()["data"];
        // dd($response);
        return view('tabel', compact('response'));
    }
}
