<?php

namespace App\Http\Controllers;

use App\Models\Tetap;
use App\Models\Kegiatan;

class TetapController extends Controller
{
   

    public function index_view ($kegiatanId)
    {
        $kegiatanAll = Kegiatan::find($kegiatanId);
        $kegiatanNama = $kegiatanAll->nama_kegiatan;

        return view('pages.user.tetap-data', [
            'tetap' => Tetap::class,
            'kegiatanNama' => $kegiatanNama,
            'kegiatanId' => $kegiatanId,
        ]);
    }

    public function createView ($kegiatanId)
    {
        return view('pages.user.tetap-new', [
            'kegiatanId' => $kegiatanId
        ]);
    }
}
