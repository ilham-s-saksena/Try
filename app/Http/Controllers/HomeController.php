<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $token = "ce478e93e58372f0478b30a872717bf8";
        $response = Http::withHeaders([
            'key' => $token,
        ])->get('https://api.rajaongkir.com/starter/city');

        if ($response->successful()) {
            $datas = $response->json();
            $data = $datas['rajaongkir'] ;

            return view('home', compact('data'));
        } else {
            return $response;
        }
    }

    public function cek(Request $request)
    {
        $token = "ce478e93e58372f0478b30a872717bf8";
        $asal = $request->input('asal');
        $tujuan = $request->input('tujuan');
        $berat = $request->input('berat');
        $kurir = $request->input('kurir');

        $response0 = Http::withHeaders([
            'key' => $token,
        ])->get('https://api.rajaongkir.com/starter/city');

        $response = Http::withHeaders([
            'key' => $token,
        ])->post('https://api.rajaongkir.com/starter/cost',
            ['origin' => $asal,
            'destination' => $tujuan,
            'weight' => $berat,
            'courier' => $kurir]);

        if ($response->successful()) {
            $ongkirs = $response->json();
            $ongkir = $ongkirs['rajaongkir']['results'][0] ;

            $datas = $response0->json();
            $data = $datas['rajaongkir'] ;


            return view('home', compact('ongkir', 'data'));

        } else {
            return $response;
        }
    }
}
