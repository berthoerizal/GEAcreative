<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Photo;
use App\Pesanan;
use Illuminate\Support\Str;

class PhotoController extends Controller
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
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = Pesanan::find($request->id_pesanan);
        if ($request->hasFile('gambar')) {
            $resorce  = $request->file('gambar');
            $gambar   = time() . '-' . $data->slug . '-' . $resorce->getClientOriginalName();
            // $resorce->move(\base_path() . "/assets/images", $gambar);
            $resorce->move(public_path() . '/assets/images', $gambar);

            $photo = Photo::create([
                'id_pesanan' => $request->id_pesanan,
                'judul' => $request->judul,
                'gambar' => $gambar,
            ]);


            if (!$photo) {
                session()->flash('error', 'Data gagal ditambah');
                return redirect(route('photo.show', $data->slug));
            } else {
                session()->flash('success', 'Data berhasil ditambah');
                return redirect(route('photo.show', $data->slug));
            }
        } else {
            $photo = Photo::create([
                'id_pesanan' => $request->id_pesanan,
                'judul' => $request->judul
            ]);

            if (!$photo) {
                session()->flash('error', 'Data gagal ditambah');
                return redirect(route('photo.show', $data->slug));
            } else {
                session()->flash('success', 'Data berhasil ditambah');
                return redirect(route('photo.show', $data->slug));
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
        if (Auth::user()->id_role == "admin") {
            $pesanan = Pesanan::where('slug', $slug)->first();
            $title = "Photo $pesanan->nama1 dan $pesanan->nama2";
            $photo = Photo::where('id_pesanan', $pesanan->id)->paginate(4);
            return view('photo.show', ['title' => $title, 'photo' => $photo, 'pesanan' => $pesanan]);
        } else {
            abort(404);
        }
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
        $request->validate([
            'judul' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = Pesanan::find($request->id_pesanan);
        if ($request->hasFile('gambar')) {
            $resorce  = $request->file('gambar');
            $gambar   = time() . '-' . $data->slug . '-' . $resorce->getClientOriginalName();
            // $resorce->move(\base_path() . "/assets/images", $gambar);
            $resorce->move(public_path() . '/assets/images', $gambar);

            $photo = Photo::find($id);
            if ($photo->gambar != 'imagedefault.png') {
                $old_image = public_path() . "/assets/images/" . $photo->gambar;
                @unlink($old_image);
            }
            $photo->update([
                'id_pesanan' => $request->id_pesanan,
                'judul' => $request->judul,
                'gambar' => $gambar,
            ]);

            if (!$photo) {
                session()->flash('error', 'Data gagal diubah');
                return redirect(route('photo.show', $data->slug));
            } else {
                session()->flash('success', 'Data berhasil diubah');
                return redirect(route('photo.show', $data->slug));
            }
        } else {
            $photo = Photo::find($id);
            $photo->update([
                'id_pesanan' => $request->id_pesanan,
                'judul' => $request->judul
            ]);

            if (!$photo) {
                session()->flash('error', 'Data gagal diubah');
                return redirect(route('photo.show', $data->slug));
            } else {
                session()->flash('success', 'Data berhasil diubah');
                return redirect(route('photo.show', $data->slug));
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
        $photo = Photo::find($id);
        $data = Pesanan::find($photo->id_pesanan);
        if ($photo->gambar != 'imagedefault.png') {
            $old_image = public_path() . "/assets/images/" . $photo->gambar;
            @unlink($old_image);
        }

        $photo->delete();
        if (!$photo) {
            session()->flash('error', 'Data gagal dihapus');
            return redirect(route('photo.show', $data->slug));
        } else {
            session()->flash('success', 'Data berhasil dihapus');
            return redirect(route('photo.show', $data->slug));
        }
    }

    public function downloadphoto($id)
    {
        $photo = DB::table('photos')
            ->leftJoin('pesanans', 'photos.id_pesanan', '=', 'pesanans.id')
            ->select('photos.*', 'pesanans.slug')
            ->where('photos.id', $id)
            ->first();
        $filePath = public_path('/assets/images/' . $photo->gambar);
        $headers = ['Content-Type: jpg'];
        $fileName = $photo->slug . '-' . time() . '.jpg';

        return response()->download($filePath, $fileName, $headers);
    }
}
