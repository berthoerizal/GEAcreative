<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;
use App\Paket;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PaketController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required',
            'harga' => 'required',
            'keterangan' => 'required'
        ]);

        $paket = Paket::create([
            'id_layanan' => $request->id_layanan,
            'nama_paket' => $request->nama_paket,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga,
            'diskon' => $request->diskon
        ]);

        $data = Layanan::find($request->id_layanan);
        if (!$paket) {
            session()->flash('error', 'Data gagal ditambah');
            return redirect(route('harga.show', $data->slug));
        } else {
            session()->flash('success', 'Data berhasil ditambah');
            return redirect(route('harga.show', $data->slug));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $layanan = Layanan::where('slug', $slug)->first();
        $title = "Harga: $layanan->nama_layanan";
        $paket = DB::table('pakets')
            ->join('layanans', 'pakets.id_layanan', '=', 'layanans.id')
            ->select('pakets.*', 'layanans.nama_layanan', 'layanans.slug')
            ->where('slug', $slug)
            ->get();
        return view('paket.show', ['title' => $title, 'paket' => $paket, 'layanan' => $layanan]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $paket = Paket::find($id);
        $paket->update([
            'id_layanan' => $request->id_layanan,
            'nama_paket' => $request->nama_paket,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga,
            'diskon' => $request->diskon
        ]);

        $data = Layanan::find($request->id_layanan);
        if (!$paket) {
            session()->flash('error', 'Data gagal diubah');
            return redirect(route('harga.show', $data->slug));
        } else {
            session()->flash('success', 'Data berhasil diubah');
            return redirect(route('harga.show', $data->slug));
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
        $paket = Paket::find($id);
        $data = Layanan::find($paket->id_layanan);
        $paket->delete();
        if (!$paket) {
            session()->flash('error', 'Data gagal dihapus');
            return redirect(route('harga.show', $data->slug));
        } else {
            session()->flash('success', 'Data berhasil dihapus');
            return redirect(route('harga.show', $data->slug));
        }
    }
}
