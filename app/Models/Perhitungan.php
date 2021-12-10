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

class Perhitungan extends Authenticatable
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

    protected $fillable = ['created_at', 'update_at']; 
    // protected $fillable = [
    //     'total_pendapatan',
    //     'initial_outlay',
    //     'total_variable',
    //     'total_semi',
    //     'total_tetap',
    //     'waktu',
    //     'bunga_id',
    //     'npv',
    //     'status', 
    // ];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('created_at', 'like', '%'.$query.'%')
                ->orWhere('status', 'like', '%'.$query.'%')
                ->orWhere('npv', 'like', '%'.$query.'%');
    }

}
