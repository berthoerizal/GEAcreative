<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Layanan;
use App\Pesanan;
use App\Galeri;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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
        $title = "Dashboard";
        $user_count = User::all()->count();
        $layanan_count = Layanan::all()->count();
        $pesanan_count = Pesanan::all()->count();
        $galeri_count = Galeri::all()->count();

        return view('dashboard', [
            'title' => $title, 
            'user_count' => $user_count, 
            'layanan_count' => $layanan_count,
            'pesanan_count' => $pesanan_count,
            'galeri_count' => $galeri_count
        ]);
    }
}
