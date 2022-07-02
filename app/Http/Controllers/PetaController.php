<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PetaController extends Controller
{
    public function detail($id)
    {
        // $response = Http::get('https://ffc6a35e-8b7c-416a-96ba-9ca78bd6f895.mock.pstmn.io/get'. $id);
        // $data['users'] = $response->json()["data"];
        // return view('tabel', compact('response'));
    }

    public function index(Request $request)
    {
        // $on_page = is_null($request->get('page')) ? 1 : $request->get('page');
        $response = Http::accept('application/json')->get('https://787ad203-77dc-49de-9f3c-e6ad11e820b9.mock.pstmn.io/get');
        $response = $response->json()["data"];
        // $data['get'] = $response->json()['data'];
        // $data['max_pages'] = $res->json()['total_pages'];
        // dd($response["data"]);
        return view('nopane', compact('response'));
    }
}
