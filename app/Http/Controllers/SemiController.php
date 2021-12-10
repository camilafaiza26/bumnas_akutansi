<?php

namespace App\Http\Controllers;

use App\Models\Semi;
use App\Models\Kegiatan;

class SemiController extends Controller
{
    public function index_view ($kegiatanId)
    {
        $kegiatanAll = Kegiatan::find($kegiatanId);
        $kegiatanNama = $kegiatanAll->nama_kegiatan;

        return view('pages.user.semi-data', [
            'semi' => Semi::class,
            'kegiatanNama' => $kegiatanNama,
            'kegiatanId' => $kegiatanId,
        ]);
    }

    public function createView ($kegiatanId)
    {
        return view('pages.user.semi-new', [
            'kegiatanId' => $kegiatanId
        ]);
    }
}
