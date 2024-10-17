<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rombel extends Model
{
    use HasFactory;

    protected $fillable = ['rombel'];

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'rombel_id'); // Adjust 'rombel_id' to your foreign key
    }
}
