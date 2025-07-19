<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class ProfilSekolah extends Model
{
  use HasUlids;

  protected $fillable = [
    'nama_sekolah',
    'npsn',
    'akreditasi',
    'logo_url',
    'address',
    'phone',
    'email',
    'tingkat',
    'status',
  ];

  protected $table = 'profil_sekolah';
}
