<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesanan;
use Illuminate\Support\Facades\DB;
use App\Layanan;
use App\Paket;
use App\Galeri;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Pesanan";
        // $pesanan = Pesanan::all();
        $pesanan = DB::table('pesanans')
            ->join('layanans', 'pesanans.id_layanan', '=', 'layanans.id')
            ->join('pakets', 'pesanans.id_paket', '=', 'pakets.id')
            ->select('pesanans.*', 'layanans.nama_layanan', 'pakets.nama_paket')
            ->get();
        return view('pesanan.index', ['title' => $title, 'pesanan' => $pesanan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Pesanan";
        $galeri = DB::table('galeris')->where('jenis', 'undangan')->get();
        $paket = DB::table('pakets')
            ->join('layanans', 'pakets.id_layanan', '=', 'layanans.id')
            ->select(DB::raw('pakets.harga-(pakets.harga*pakets.diskon/100) as total_bayar'), 'pakets.id', 'pakets.nama_paket', 'layanans.nama_layanan', 'layanans.status_layanan')
            ->where('status_layanan', 'publish')
            ->orderBy('nama_layanan', 'asc')
            ->orderBy('total_bayar', 'asc')
            ->get();

        return view('pesanan.create', ['title' => $title, 'paket' => $paket, 'galeri' => $galeri]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pasangan = "$request->nama1 dan $request->nama2";
        $paket = Paket::find($request->id_paket);
        $bayar = $paket->harga-($paket->harga*$paket->diskon/100);
        $pesanan = Pesanan::create([
            'id_layanan' => $paket->id_layanan,
            'id_paket' => $request->id_paket,
            'id_galeri' => $request->id_galeri,
            'pemesan' => $request->pemesan,
            'nomor_hp' => $request->nomor_hp,
            'slug' => Str::slug($pasangan),
            'acara1' => $request->acara1,
            'acara2' => $request->acara2,
            'nama1' => $request->nama1,
            'nama2' => $request->nama2,
            'nama_lengkap1' => $request->nama_lengkap1,
            'nama_lengkap2' => $request->nama_lengkap2,
            'ortu1' => $request->ortu1,
            'ortu2' => $request->ortu2,
            'tanggal1' => $request->tanggal1,
            'tanggal2' => $request->tanggal2,
            'waktu1' => $request->waktu1,
            'waktu2' => $request->waktu2,
            'lokasi1' => $request->lokasi1,
            'lokasi2' => $request->lokasi2,
            'lokasi_googlemaps' => $request->lokasi_googlemaps,
            'keterangan' => $request->keterangan,
            'quotes' => $request->quotes,
            'backsound' => $request->backsound,
            'kepada' => $request->kepada,
            'status' => $request->status,
            'bayar' => $bayar
        ]);

        if (!$pesanan) {
            session()->flash('error', 'Data gagal ditambah');
            return redirect(route('pesanan.index'));
        } else {
            session()->flash('success', 'Data berhasil ditambah');
            return redirect(route('pesanan.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $title = "Edit Pesanan";
        $pesanan = DB::table('pesanans')->where('slug', $slug)->first();
        $galeri = DB::table('galeris')->where('jenis', 'undangan')->get();
        $paket = DB::table('pakets')
            ->join('layanans', 'pakets.id_layanan', '=', 'layanans.id')
            ->select(DB::raw('pakets.harga-(pakets.harga*pakets.diskon/100) as total_bayar'), 'pakets.id', 'pakets.nama_paket', 'layanans.nama_layanan', 'layanans.status_layanan')
            ->where('status_layanan', 'publish')
            ->orderBy('nama_layanan', 'asc')
            ->orderBy('total_bayar', 'asc')
            ->get();
        return view('pesanan.edit', ['title' => $title, 'paket' => $paket, 'galeri' => $galeri, 'pesanan' => $pesanan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pasangan = "$request->nama1 dan $request->nama2";
        $paket = Paket::find($request->id_paket);
        $bayar = $paket->harga-($paket->harga*$paket->diskon/100);
        $pesanan = Pesanan::find($id);
        $pesanan->update([
            'id_layanan' => $paket->id_layanan,
            'id_paket' => $request->id_paket,
            'id_galeri' => $request->id_galeri,
            'pemesan' => $request->pemesan,
            'nomor_hp' => $request->nomor_hp,
            'slug' => Str::slug($pasangan),
            'acara1' => $request->acara1,
            'acara2' => $request->acara2,
            'nama1' => $request->nama1,
            'nama2' => $request->nama2,
            'nama_lengkap1' => $request->nama_lengkap1,
            'nama_lengkap2' => $request->nama_lengkap2,
            'ortu1' => $request->ortu1,
            'ortu2' => $request->ortu2,
            'tanggal1' => $request->tanggal1,
            'tanggal2' => $request->tanggal2,
            'waktu1' => $request->waktu1,
            'waktu2' => $request->waktu2,
            'lokasi1' => $request->lokasi1,
            'lokasi2' => $request->lokasi2,
            'lokasi_googlemaps' => $request->lokasi_googlemaps,
            'keterangan' => $request->keterangan,
            'quotes' => $request->quotes,
            'backsound' => $request->backsound,
            'kepada' => $request->kepada,
            'status' => $request->status,
            'bayar' => $bayar
        ]);

        if (!$pesanan) {
            session()->flash('error', 'Data gagal diubah');
            return redirect(route('pesanan.index'));
        } else {
            session()->flash('success', 'Data berhasil diubah');
            return redirect(route('pesanan.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->delete();
        if (!$pesanan) {
            session()->flash('error', 'Data gagal dihapus');
            return redirect(route('pesanan.index'));
        } else {
            session()->flash('success', 'Data berhasil dihapus');
            return redirect(route('pesanan.index'));
        }
    }
}
