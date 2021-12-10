<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class Kegiatan extends Authenticatable
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
        'nama_kegiatan',
        'waktu_kegiatan',
        'bidang_id'
    ];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('nama_kegiatan', 'like', '%'.$query.'%')
                ->orWhere('nama_bidang', 'like', '%'.$query.'%')
                ->orWhere('waktu_kegiatan', 'like', '%'.$query.'%');
    }

}
