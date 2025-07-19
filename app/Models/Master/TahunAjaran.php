<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TahunAjaran extends Model
{
    use HasUlids;

    protected $fillable = ['tahun_ajaran', 'status'];
    protected $table    = 'tahun_ajaran';

    public function semester(): HasMany
    {
        return $this->hasMany(Semester::class);
    }
}
