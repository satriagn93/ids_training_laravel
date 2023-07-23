<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $guarded = ['id'];


    public function karyawan_detail(): BelongsTo
    {
        return $this->belongsTo(User::class, 'karyawan_detail_id', 'id');
    }
}
