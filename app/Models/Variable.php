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

class Variable extends Authenticatable
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
        'user_id',
        'namaV',
        'hargaV',
        'ketV',
        'kegiatan_id', 
        
    ];
    public static function search($query)
    {
        //dd(Variable::where('user_id', 1));
        return empty($query) ? static::query()
            : static::where('namaV', 'like', '%'.$query.'%')
                ->orWhere('created_at', 'like', '%'.$query.'%');
    }

    public static function hello($userId)
    {
        return static::where('user_id', $userId);

    }

}
