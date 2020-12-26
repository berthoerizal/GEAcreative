<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $fillable = [
        'id_layanan',
        'id_paket',
        'id_galeri',
        'pemesan',
        'nomor_hp',
        'slug', 'acara1',
        'acara2',
        'nama1',
        'nama2',
        'nama_lengkap1',
        'nama_lengkap2',
        'ayah1',
        'ibu1',
        'ayah2',
        'ibu2',
        'quotes',
        'tanggal1',
        'waktu1',
        'tanggal2',
        'waktu2',
        'lokasi1',
        'lokasi2',
        'lokasi_googlemaps',
        'keterangan',
        'backsound',
        'kepada',
        'status',
        'bayar'
    ];
}
