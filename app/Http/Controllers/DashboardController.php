<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Perhitungan;
use App\Models\Tetap;
use App\Models\User;

class DashboardController extends Controller
{

   
    public function index_view ()
    {
        $jumlahUser =  User::select('id')->count();
        $jumlahKegiatan =  Kegiatan::select('id')->count();
        $untung = Perhitungan::select('npv')->where('npv', '>', 0)->count();
        $rugi =  Perhitungan::select('npv')->where('npv', '<', 0)->count();
        return view('dashboard', [
           'jumlah_user' => $jumlahUser,
           'jumlah_kegiatan' => $jumlahKegiatan,

           'jumlah_untung' => $untung,
           'jumlah_rugi' => $rugi,

        ]);
    }

}
