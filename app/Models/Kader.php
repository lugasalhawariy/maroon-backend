<?php

namespace App\Models;

// data yang dibutuhkan
use App\User;
// use Laravel\Passport\HasApiTokens;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kader extends Model
{
    use SoftDeletes;

    protected $table = 'kader';

    protected $fillable = [
        'users_id', 'nama', 'nim', 'prodi', 'ttl', 'alamat_asal', 'alamat_jogja'
    ];

    protected $hidden = [

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
