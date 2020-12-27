<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfigurasi extends Model
{
    protected $fillable = ['author', 'namaweb', 'lokasi_googlemaps', 'email', 'nomor_hp', 'instagram', 'desc1', 'desc2','keywords', 'alamat'];
}
