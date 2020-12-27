<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $galeri_website = DB::table('galeris')->where('jenis', 'undangan_website')->get();
        $galeri_gambar = DB::table('galeris')->where('jenis', 'undangan_gambar')->get();
        $galeri_video = DB::table('galeris')->where('jenis', 'undangan_video')->get();
        $users = DB::table('users')->select('name', 'gambar')->get();

        return view('welcome', [
            'layanan' => $layanan,
            'detail' => $detail,
            'galeri_website' => $galeri_website,
            'galeri_gambar' => $galeri_gambar,
            'galeri_video' => $galeri_video,
            'users' => $users
        ]);
    }
}
