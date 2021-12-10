<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use App\Models\Tetap;

class KegiatanController extends Controller
{

   
    public function index_view ()
    {
        return view('pages.user.kegiatan-data', [
            'kegiatan' => Kegiatan::class,
        ]);
    }

}
