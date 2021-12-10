<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Pendapatan;
use App\Models\Variable;

use App\Models\Semi;
use App\Models\Tetap;

class PendapatanController extends Controller
{
    
    public $kegiatanId;
    public $kegiatanNama;


    public function index_view ($kegiatanId)
    {
        $kegiatanAll = Kegiatan::find($kegiatanId);
        $kegiatanNama = $kegiatanAll->nama_kegiatan;

        return view('pages.user.pendapatan-data', [
            'pendapatan' => Pendapatan::class,
            'kegiatanId' => $kegiatanId,
            'kegiatanNama' => $kegiatanNama,
            // 'variable' => Variable::class,
            // 'semi' => Semi::class,
            // 'tetap' => Tetap::class,
        ]);
    }

    
    public function createView ($kegiatanId)
    {
        $waktuDiKegiatan = Kegiatan::select('waktu_kegiatan')->where('id', $kegiatanId)->first();
        $waktu = $waktuDiKegiatan->waktu_kegiatan;

        return view('pages.user.pendapatan-new', [
            'kegiatanId' => $kegiatanId,
            'waktu' => $waktu
        ]);
    }
}
