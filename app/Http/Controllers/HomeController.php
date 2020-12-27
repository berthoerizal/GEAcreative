<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Konfigurasi;

class HomeController extends Controller
{
    public function index(){
        $layanan = DB::table('layanans')->where('status_layanan', 'publish')->get();
        $detail = DB::table('details')
        ->join('layanans', 'details.id_layanan', '=', 'layanans.id')
        ->select('details.*', 'layanans.status_layanan')
        ->where('status_layanan', 'publish')
        ->orderBy('id_layanan', 'asc')
        ->get();
        $galeri = DB::table('galeris')->all(); 

        return view('welcome', [
            'layanan' => $layanan,
            'detail' => $detail,
            'galeri' => $galeri
        ]);
    }
}
