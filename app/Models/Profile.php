<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasUlids;

class Profile extends Model
{
    use HasUlids;

    protected $fillable = [
        'full_name',
        'image',
        'jenis_kelamin',
    ];
}
