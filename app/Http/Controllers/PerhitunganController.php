<?php

namespace App\Http\Controllers;

use App\Exports\PerhitunganExport;
use App\Models\Perhitungan;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class PerhitunganController extends Controller
{
    public function index_view ()
    {
        return view('pages.user.perhitungan-data', [
            'perhitungan' => Perhitungan::class
        ]);
    }

    public function exportIntoExcel(){
        return Excel::download(new PerhitunganExport, 'riwayat-perhitungan.xlsx');
    }
}
