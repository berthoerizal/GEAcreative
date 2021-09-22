<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $layanan = DB::table('layanans')->where('status_layanan', 'publish')->get();
        $detail = DB::table('details')
            ->join('layanans', 'details.id_layanan', '=', 'layanans.id')
            ->select('details.*', 'layanans.status_layanan')
            ->where('status_layanan', 'publish')
            ->orderBy('id_layanan', 'asc')
            ->get();
        $galeri_website = DB::table('galeris')
            ->leftJoin('layanans', 'galeris.id_layanan', '=', 'layanans.id')
            ->where('layanans.slug', 'undangan-website')->get();
        $galeri_gambar = DB::table('galeris')
            ->leftJoin('layanans', 'galeris.id_layanan', '=', 'layanans.id')
            ->where('layanans.slug', 'undangan-gambar')->get();
        $galeri_video = DB::table('galeris')
            ->leftJoin('layanans', 'galeris.id_layanan', '=', 'layanans.id')
            ->where('layanans.slug', 'undangan-video')->get();
        $users = DB::table('users')->select('name', 'gambar', 'jabatan')->get();
        $paket = DB::table('pakets')
            ->join('layanans', 'pakets.id_layanan', '=', 'layanans.id')
            ->select(DB::raw('pakets.harga-(pakets.harga*pakets.diskon/100) as total_bayar'), 'pakets.id', 'pakets.nama_paket', 'pakets.keterangan', 'layanans.nama_layanan', 'layanans.status_layanan')
            ->where('status_layanan', 'publish')
            ->orderBy('total_bayar', 'desc')
            ->get();

        return view('welcome', [
            'layanan' => $layanan,
            'detail' => $detail,
            'galeri_website' => $galeri_website,
            'galeri_gambar' => $galeri_gambar,
            'galeri_video' => $galeri_video,
            'users' => $users,
            'paket' => $paket
        ]);
    }
}
