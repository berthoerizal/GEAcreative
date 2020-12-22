<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Galeri;
use App\Layanan;
use Illuminate\Support\Str;

class GaleriController extends Controller
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
        $title = "Galeri";
        $galeri = DB::table('galeris')
            ->join('layanans', 'galeris.id_layanan', '=', 'layanans.id')
            ->join('users', 'galeris.id_user', '=', 'users.id')
            ->select('galeris.*', 'layanans.nama_layanan', 'users.name')
            ->get();
        return view('galeri.index', ['title' => $title, 'galeri' => $galeri]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Galeri";
        $layanan = DB::table('layanans')->where('status_layanan', 'publish')->get();
        return view('galeri.create', ['title' => $title, 'layanan' => $layanan]);
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
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $galeri = Galeri::all();
        foreach ($galeri as $galeri) {
            if ($galeri->judul == $request->judul) {
                session()->flash('error', 'Judul tidak boleh sama');
                return redirect(route('galeri.create'));
            }
        }

        if ($request->hasFile('gambar')) {
            $resorce  = $request->file('gambar');
            $gambar   = Str::slug($request->judul) . '-' . $resorce->getClientOriginalName();
            // $resorce->move(\base_path() . "/assets/images", $gambar);
            $resorce->move(public_path() . '/assets/images', $gambar);

            $galeri = Galeri::create([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'gambar' => $gambar,
                'id_layanan' => $request->id_layanan,
                'id_user' => Auth::user()->id
            ]);

            if (!$galeri) {
                session()->flash('error', 'Data gagal ditambah');
                return redirect(route('galeri.index'));
            } else {
                session()->flash('success', 'Data berhasil ditambah');
                return redirect(route('galeri.index'));
            }
        } else {
            $galeri = Galeri::create([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'id_layanan' => $request->id_layanan,
                'id_user' => Auth::user()->id
            ]);

            if (!$galeri) {
                session()->flash('error', 'Data gagal ditambah');
                return redirect(route('galeri.index'));
            } else {
                session()->flash('success', 'Data berhasil ditambah');
                return redirect(route('galeri.index'));
            }
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
        $title = "Edit Galeri";
        $galeri = Galeri::where('slug', $slug)->first();
        $layanan = DB::table('layanans')->where('status_layanan', 'publish')->get();
        return view('galeri.edit', ['title' => $title, 'layanan' => $layanan, 'galeri' => $galeri]);
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
            'judul' => 'required|unique:galeris,judul,' . $id,
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $resorce  = $request->file('gambar');
            $gambar   = $resorce->getClientOriginalName();
            // $resorce->move(\base_path() . "/../assets/images", $gambar);
            $resorce->move(public_path() . '/assets/images', $gambar);

            $galeri = Galeri::find($id);
            if ($galeri->gambar != 'imagedefault.png') {
                $old_image = public_path() . "/assets/images/" . $galeri->gambar;
                @unlink($old_image);
            }

            $galeri->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'gambar' => $gambar,
                'id_layanan' => $request->id_layanan,
                'id_user' => Auth::user()->id
            ]);

            if (!$galeri) {
                $galeri = Galeri::find($id);
                session()->flash('error', 'Data gagal diubah');
                return redirect(route('galeri.edit', $galeri->slug));
            } else {
                session()->flash('success', 'Data berhasil diubah');
                return redirect(route('galeri.index'));
            }
        } else {
            $galeri = Galeri::find($id);
            $galeri->update([
                'judul' => $request->judul,
                'slug' => Str::slug($request->judul),
                'id_layanan' => $request->id_layanan,
                'id_user' => Auth::user()->id
            ]);

            if (!$galeri) {
                $galeri = Galeri::find($id);
                session()->flash('error', 'Data gagal diubah');
                return redirect(route('galeri.edit', $galeri->slug));
            } else {
                session()->flash('success', 'Data berhasil diubah');
                return redirect(route('galeri.index'));
            }
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
        $galeri = Galeri::find($id);
        if ($galeri->gambar != 'imagedefault.png') {
            $old_image = public_path() . "/assets/images/" . $galeri->gambar;
            @unlink($old_image);
        }

        $galeri->delete();
        if (!$galeri) {
            session()->flash('error', 'Data gagal dihapus');
            return redirect(route('galeri.index'));
        } else {
            session()->flash('success', 'Data berhasil dihapus');
            return redirect(route('galeri.index'));
        }
    }
}
