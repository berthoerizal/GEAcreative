<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Galeri;
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
            ->leftJoin('users', 'galeris.id_user', '=', 'users.id')
            ->leftJoin('layanans', 'galeris.id_layanan', '=', 'layanans.id')
            ->select('galeris.*', 'users.name', 'layanans.nama_layanan')
            ->orderBy('kode', 'asc')
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
        $galeri_count = Galeri::all()->count();
        $galeri = Galeri::all();
        $kode_item = 0;
        if ($galeri_count > 0) {
            foreach ($galeri as $galeri) {
                $kode_item = $galeri->kode;
            }
        }
        $kode_item = $kode_item + 1;

        $layanans = DB::table('layanans')->where('status_layanan', 'publish')->get();
        return view('galeri.create', ['title' => $title, 'kode_item' => $kode_item, 'layanans' => $layanans]);
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
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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
                'slug' => Str::slug($request->judul) . '-' . time(),
                'gambar' => $gambar,
                'id_layanan' => $request->id_layanan,
                'id_user' => Auth::user()->id,
                'kode' => $request->kode_item,
                'link_video' => $request->link_video
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
                'slug' => Str::slug($request->judul) . '-' . time(),
                'id_layanan' => $request->id_layanan,
                'id_user' => Auth::user()->id,
                'kode' => $request->kode_item,
                'link_video' => $request->link_video
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
    public function show($slug)
    {
        $title = "Detail Galeri";
        $galeri = DB::table('galeris')
            ->leftJoin('users', 'galeris.id_user', '=', 'users.id')
            ->leftJoin('layanans', 'galeris.id_layanan', '=', 'layanans.id')
            ->select('galeris.*', 'users.name', 'layanans.nama_layanan')
            ->where('galeris.slug', $slug)
            ->first();
        return view('galeri.show', [
            'title' => $title,
            'galeri' => $galeri
        ]);
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
        $layanans = DB::table('layanans')->where('status_layanan', 'publish')->get();

        if (Auth::user()->id == $galeri->id_user) {
            return view('galeri.edit', ['title' => $title, 'galeri' => $galeri, 'layanans' => $layanans]);
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
                'slug' => Str::slug($request->judul) . '-' . time(),
                'gambar' => $gambar,
                'id_layanan' => $request->id_layanan,
                'id_user' => Auth::user()->id,
                'kode' => $request->kode,
                'link_video' => $request->link_video
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
                'slug' => Str::slug($request->judul) . '-' . time(),
                'id_layanan' => $request->id_layanan,
                'id_user' => Auth::user()->id,
                'kode' => $request->kode,
                'link_video' => $request->link_video
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

        $galeri_all = Galeri::all();
        $galeri_count = Galeri::all()->count();
        $x = 1;
        if ($galeri_count > 0) {
            foreach ($galeri_all as $galeri_all) {
                Galeri::where('id', $galeri_all->id)->update(['kode' => $x]);
                $x++;
            }
        }

        if (!$galeri) {
            session()->flash('error', 'Data gagal dihapus');
            return redirect(route('galeri.index'));
        } else {
            session()->flash('success', 'Data berhasil dihapus');
            return redirect(route('galeri.index'));
        }
    }
}
