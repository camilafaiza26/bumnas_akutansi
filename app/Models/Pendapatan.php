<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Pendapatan extends Authenticatable
{
    // use HasApiTokens;
    // use HasFactory;
    // use HasProfilePhoto;
    // use Notifiable;
    // use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'jumlah_pendapatan',
        'tahun_ke', 
        'kegiatan_id', 
        'bunga_id', 
    ];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('jumlah_pendapatan', 'like', '%'.$query.'%')
                ->orWhere('tahun_ke', 'like', '%'.$query.'%');
    }

}
