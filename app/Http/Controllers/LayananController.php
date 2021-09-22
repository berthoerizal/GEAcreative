<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Layanan;
use Illuminate\Support\Str;

class LayananController extends Controller
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
            $title = "Layanan";
            $layanan = Layanan::all();
            return view('layanan.index', ['title' => $title, 'layanan' => $layanan]);
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
        if (Auth::user()->id_role == "admin") {
            $title = "Tambah Layanan";
            return view('layanan.create', ['title' => $title]);
        } else {
            abort(404);
        }
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
            'nama_layanan' => 'required',
            'keterangan' => 'required',
        ]);

        $layanans = Layanan::all();
        foreach ($layanans as $layanans) {
            if ($layanans->slug == Str::slug($request->nama_layanan)) {
                session()->flash('error', 'Nama layanan sudah digunakan');
                return redirect(route('layanan.create'));
            }
        }

        $layanan = Layanan::create([
            'nama_layanan' => $request->nama_layanan,
            'slug' => Str::slug($request->nama_layanan),
            'keterangan' => $request->keterangan,
            'status_layanan' => $request->status_layanan
        ]);

        if (!$layanan) {
            session()->flash('error', 'Data gagal ditambah');
            return redirect(route('layanan.create'));
        } else {
            session()->flash('success', 'Data berhasil ditambah');
            return redirect(route('layanan.index'));
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
        if (Auth::user()->id_role == "admin") {
            $title = "Edit Layanan";
            $layanan = DB::table('layanans')->where('slug', $slug)->first();
            return view('layanan.edit', ['title' => $title, 'layanan' => $layanan]);
        } else {
            abort(404);
        }
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
        $request->validate([
            'nama_layanan' => 'required|unique:layanans,nama_layanan,' . $id,
            'keterangan' => 'required'
        ]);
        $layanan = Layanan::find($id);
        $layanan->update([
            'nama_layanan' => $request->nama_layanan,
            'slug' => Str::slug($request->nama_layanan),
            'status_layanan' => $request->status_layanan,
            'keterangan' => $request->keterangan
        ]);
        if (!$layanan) {
            $layanan = Layanan::find($id);
            session()->flash('error', 'Data gagal diubah');
            return redirect(route('layanan.edit', $layanan->slug));
        } else {
            session()->flash('success', 'Data berhasil diubah');
            return redirect(route('layanan.index'));
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
        $layanan = Layanan::find($id);
        $layanan->delete();
        if (!$layanan) {
            session()->flash('error', 'Data gagal dihapus');
            return redirect(route('layanan.index'));
        } else {
            session()->flash('success', 'Data berhasil dihapus');
            return redirect(route('layanan.index'));
        }
    }
}
