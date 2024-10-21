<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'rombel_id'); // Again, adjust 'rombel_id' if needed
    }

    // Relasi Siswa dimiliki oleh User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $fillable = [
        'foto',
        'nis',
        'nama',
        'email',
        'rombel',
        'rayon',
    ];
}
