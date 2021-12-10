<?php

namespace App\Http\Livewire;

use App\Models\Bidang;
use App\Models\Kegiatan;
use App\Models\Tetap;
use App\Models\Variable;
use App\Models\Pendapatan;
use App\Models\Semi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Kalkulasi extends Component
{

    public $a; 
    
    public function render ($kegiatanId)
    {
        $kegiatanInHere = Kegiatan::join('bidangs', 'bidangs.id_bidang', '=', 'kegiatans.bidang_id')->where('kegiatans.id',$kegiatanId)->first();

        $pend = Pendapatan::join('kegiatans', 'kegiatans.id', '=', 'pendapatans.kegiatan_id')->where('pendapatans.kegiatan_id' , $kegiatanId)->get();
      
        $variable = Variable::join('kegiatans', 'kegiatans.id', '=', 'variables.kegiatan_id')->where('variables.kegiatan_id' , $kegiatanId)->get();

        $semi = Semi::join('kegiatans', 'kegiatans.id', '=', 'semis.kegiatan_id')->where('semis.kegiatan_id' , $kegiatanId)->get();
       
        $tetap = Tetap::join('kegiatans', 'kegiatans.id', '=', 'tetaps.kegiatan_id')->where('tetaps.kegiatan_id' , $kegiatanId)->get();

        return view('livewire.kalkulasi', [
            'kegiatanInHere' => $kegiatanInHere ,
            'kegiatanId' => $kegiatanId,
            'pendapatans' => $pend,
            'variables' => $variable,
            'semis' => $semi,
            'tetaps' => $tetap,
        ]);
       
    }

    public function confirmPerhitungan(){

       

    }
    
}
