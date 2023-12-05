<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;

    protected $guarded = [];


    //belongs to user

    public function users()
    {
        return $this->belongsToMany(User::class,'user_sertifikats');
    }

    //has one lokasigambar

    public function lokasigambar()
    {
        return $this->hasOne(LokasiGambar::class);
    }
}
