<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Konfigurasi;
use Illuminate\Support\Facades\Auth;

class KonfigurasiController extends Controller
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
        if (Auth::user()->id_role == "admin") {
            $konfig = DB::table('konfigurasis')->first();
            $title = "Konfigurasi";

            return view('konfigurasi.index', [
                'title' => $title,
                'konfig' => $konfig
            ]);
        } else {
            abort(404);
        }
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
        //
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
        $konfig = Konfigurasi::find($id);
        $konfig->update([
            'author' => $request->author,
            'namaweb' => $request->namaweb,
            'lokasi_googlemaps' => $request->lokasi_googlemaps,
            'alamat' => $request->alamat,
            'desc1' => $request->desc1,
            'desc2' => $request->desc2,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'instagram' => $request->instagram,
            'keywords' => $request->keywords
        ]);

        if (!$konfig) {
            session()->flash('error', 'Data gagal diubah');
            return redirect(route('konfigurasi.index'));
        } else {
            session()->flash('success', 'Data berasil diubah');
            return redirect(route('konfigurasi.index'));
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
        //
    }
}
