<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KaryawanDetail extends Model
{
    protected $table = 'karyawan_detail';
    protected $guarded = ['id'];

    public function karyawan(): HasOne
    {
        return $this->hasOne(Karyawan::class, 'karyawan_detail_id', 'id');
    }
}
