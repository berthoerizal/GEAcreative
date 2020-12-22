<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Detail;
use App\Layanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DetailController extends Controller
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
            'keterangan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $resorce  = $request->file('gambar');
            $gambar   = Str::slug($request->keterangan) . '-' . $resorce->getClientOriginalName();
            // $resorce->move(\base_path() . "/assets/images", $gambar);
            $resorce->move(public_path() . '/assets/images', $gambar);

            $detail = Detail::create([
                'id_layanan' => $request->id_layanan,
                'keterangan' => $request->keterangan,
                'gambar' => $gambar,
            ]);

            $data = Layanan::find($request->id_layanan);
            if (!$detail) {
                session()->flash('error', 'Data gagal ditambah');
                return redirect(route('detail.show', $data->slug));
            } else {
                session()->flash('success', 'Data berhasil ditambah');
                return redirect(route('detail.show', $data->slug));
            }
        } else {
            $detail = Detail::create([
                'id_layanan' => $request->id_layanan,
                'keterangan' => $request->keterangan,
            ]);

            $data = Layanan::find($request->id_layanan);
            if (!$detail) {
                session()->flash('error', 'Data gagal ditambah');
                return redirect(route('detail.show', $data->slug));
            } else {
                session()->flash('success', 'Data berhasil ditambah');
                return redirect(route('detail.show', $data->slug));
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
        $layanan = Layanan::where('slug', $slug)->first();
        $title = $layanan->nama_layanan;
        $detail = DB::table('details')
            ->join('layanans', 'details.id_layanan', '=', 'layanans.id')
            ->select('details.*', 'layanans.nama_layanan', 'layanans.slug')
            ->where('slug', $slug)
            ->get();
        return view('detail.show', ['title' => $title, 'detail' => $detail, 'layanan' => $layanan]);
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
            'keterangan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $resorce  = $request->file('gambar');
            $gambar   = Str::slug($request->keterangan) . '-' . $resorce->getClientOriginalName();
            // $resorce->move(\base_path() . "/assets/images", $gambar);
            $resorce->move(public_path() . '/assets/images', $gambar);

            $detail = Detail::find($id);
            if ($detail->gambar != 'imagedefault.png') {
                $old_image = public_path() . "/assets/images/" . $detail->gambar;
                @unlink($old_image);
            }
            $detail->update([
                'id_layanan' => $request->id_layanan,
                'keterangan' => $request->keterangan,
                'gambar' => $gambar,
            ]);

            $data = Layanan::find($request->id_layanan);
            if (!$detail) {
                session()->flash('error', 'Data gagal diubah');
                return redirect(route('detail.show', $data->slug));
            } else {
                session()->flash('success', 'Data berhasil diubah');
                return redirect(route('detail.show', $data->slug));
            }
        } else {
            $detail = Detail::find($id);
            $detail->update([
                'id_layanan' => $request->id_layanan,
                'keterangan' => $request->keterangan
            ]);


            $data = Layanan::find($request->id_layanan);
            if (!$detail) {
                session()->flash('error', 'Data gagal diubah');
                return redirect(route('detail.show', $data->slug));
            } else {
                session()->flash('success', 'Data berhasil diubah');
                return redirect(route('detail.show', $data->slug));
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
        $detail = Detail::find($id);
        $data = Layanan::find($detail->id_layanan);
        if ($detail->gambar != 'imagedefault.png') {
            $old_image = public_path() . "/assets/images/" . $detail->gambar;
            @unlink($old_image);
        }

        $detail->delete();
        if (!$detail) {
            session()->flash('error', 'Data gagal dihapus');
            return redirect(route('detail.show', $data->slug));
        } else {
            session()->flash('success', 'Data berhasil dihapus');
            return redirect(route('detail.show', $data->slug));
        }
    }
}
