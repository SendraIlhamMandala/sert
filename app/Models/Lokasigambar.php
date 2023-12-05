<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasigambar extends Model
{
    use HasFactory;

    protected $guarded = [];

    //belong to one sertifikat
    public function sertifikat()
    {
        return $this->belongsTo(Sertifikat::class);
    }
}
