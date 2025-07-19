<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Jurusan extends Model
{
  use HasUlids;

  protected $fillable = [
    'nama_jurusan',
    'singkatan',
  ];

  protected $table = 'jurusan';
}
