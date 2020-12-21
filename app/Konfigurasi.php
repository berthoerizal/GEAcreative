<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konfigurasi extends Model
{
    protected $fillable = ['author', 'namaweb', 'lokasi', 'email', 'nomor_hp', 'instagram', 'desc'];
}
