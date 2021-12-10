<?php

namespace App\Http\Controllers;

use App\Models\Variable;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Auth;

class VariableController extends Controller
{
    public function index_view ($kegiatanId)
    {
        $kegiatanAll = Kegiatan::find($kegiatanId);
        $kegiatanNama = $kegiatanAll->nama_kegiatan;

        return view('pages.user.variable-data', [
            'variable' => Variable::class,
            'kegiatanNama' => $kegiatanNama,
            'kegiatanId' => $kegiatanId,
        ]);
    }

    public function createView ($kegiatanId)
    {
        return view('pages.user.variable-new', [
            'kegiatanId' => $kegiatanId
        ]);
    }
}
