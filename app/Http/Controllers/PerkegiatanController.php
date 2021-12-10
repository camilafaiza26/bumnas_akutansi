<?php

namespace App\Http\Controllers;

use App\Models\Perhitungan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\Models\Variable;

use App\Models\Semi;
use App\Models\Tetap;
use App\Models\Pendapatan;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PerkegiatanController extends Controller
{
    public $kegiatanId;
    public $kegiatanNama;
    // public   $jumlahNPV = 0;
    // public $tempNPV;

    public function index_view ($kegiatanId)
    {
        $kegiatanAll = Kegiatan::find($kegiatanId);
        $kegiatanNama = $kegiatanAll->nama_kegiatan;

        
        return view('pages.user.perkegiatan-data', [
            'perkegiatan' => Perhitungan::class,
            'kegiatanId' =>  $kegiatanId,
            'kegiatanNama' => $kegiatanNama,
        ]);
       
    }

    public function kalkulasi_view ($kegiatanId)
    {
        
        $kegiatanInHere = Kegiatan::join('bidangs', 'bidangs.id_bidang', '=', 'kegiatans.bidang_id')->where('kegiatans.id',$kegiatanId)->first();

        $pend = Pendapatan::join('kegiatans', 'kegiatans.id', '=', 'pendapatans.kegiatan_id')
        ->join('bungas', 'bungas.id_bunga', '=' ,'pendapatans.bunga_id')
        ->where('pendapatans.kegiatan_id' , $kegiatanId)->get();
      
        $variable = Variable::join('kegiatans', 'kegiatans.id', '=', 'variables.kegiatan_id')->where('variables.kegiatan_id' , $kegiatanId)->get();

        $semi = Semi::join('kegiatans', 'kegiatans.id', '=', 'semis.kegiatan_id')->where('semis.kegiatan_id' , $kegiatanId)->get();
       
        $tetap = Tetap::join('kegiatans', 'kegiatans.id', '=', 'tetaps.kegiatan_id')->where('tetaps.kegiatan_id' , $kegiatanId)->get();   
  
      

        return view('pages.user.kalkulasi-data', [
            'kegiatanInHere' => $kegiatanInHere ,
            'kegiatanId' => $kegiatanId,
            'pendapatans' => $pend,
            'variables' => $variable,
            'semis' => $semi,
            'tetaps' => $tetap,
            
        ]);
       
    }
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($kegiatanId)
    {
        alert()->question('Apakah Data Sudah Benar?','Pastikan data yang anda isi sudah benar!')
        ->showConfirmButton('<a href="/rencanakegiatan/'.$kegiatanId.'/perhitungan/store" class="text-white no-underline hover:no-underline">Lakukan Perhitungan</a>', '#3085d6')->toHtml()
        ->showCancelButton('Belum benar', '#aaa')->reverseButtons();

        return back();
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeP($kegiatanId)
    {
        $pendapatan =  Pendapatan::join('kegiatans', 'kegiatans.id', '=', 'pendapatans.kegiatan_id')->where('pendapatans.kegiatan_id' , $kegiatanId)->sum('pendapatans.jumlah_pendapatan');
        $variable = Variable::join('kegiatans', 'kegiatans.id', '=', 'variables.kegiatan_id')->where('variables.kegiatan_id' , $kegiatanId)->sum('variables.hargaV');
        $semi = Semi::join('kegiatans', 'kegiatans.id', '=', 'semis.kegiatan_id')->where('semis.kegiatan_id' , $kegiatanId)->sum('semis.hargaS');
        $tetap = Tetap::join('kegiatans', 'kegiatans.id', '=', 'tetaps.kegiatan_id')->where('tetaps.kegiatan_id' , $kegiatanId)->sum('tetaps.hargaT');

        $initial_outlay = $variable + $semi + $tetap;


        $getBunga = Pendapatan::select('pendapatans.bunga_id', 'bungas.bunga', 'kegiatans.waktu_kegiatan')
        ->join('kegiatans', 'kegiatans.id', '=', 'pendapatans.kegiatan_id')
        ->join('bungas', 'bungas.id_bunga', '=', 'pendapatans.bunga_id')
        ->where('pendapatans.kegiatan_id' , $kegiatanId)
        ->first();
        $bungaId = $getBunga->bunga_id;
        $bunga = $getBunga->bunga;
        
        $waktu = $getBunga->waktu_kegiatan;
        $created_at = date('Y-m-d H:i:s');
    


        //PERHITUNGAN NPV 
        $pendapatanAll =  Pendapatan::join('kegiatans', 'kegiatans.id', '=', 'pendapatans.kegiatan_id')->where('pendapatans.kegiatan_id' , $kegiatanId)->get();
        $jumlahNPV=0;
        foreach (range(0, $waktu-1) as $i) {
        $tempNPV = ($pendapatanAll[$i]['jumlah_pendapatan']/pow((1+($bunga*0.01)),$i+1))- 3;
        $jumlahNPV += $tempNPV;
        }

        if($jumlahNPV < 0){
             $status = "Rugi";
        }
            else{
        $status = "Untung";
        }

        $jumlahNPVBulat = round($jumlahNPV,3);
        
        //INSERT DB
        DB::insert('insert into perhitungans (kegiatan_id, total_pendapatan, initial_outlay, total_variable, total_semi,
        total_tetap, waktu, bunga_id, npv, status, created_at) values (?,?,?,?,?,?,?,?,?,?,?)', [$kegiatanId, $pendapatan
       ,$initial_outlay,$variable,$semi,$tetap,$waktu,$bungaId, $jumlahNPVBulat ,$status, $created_at]);
        //kegiatan id, pendapatan, initial, v, s,t,w, idbunga, npv, status


        if($status == "Untung"){
            alert()->success('Hasil Perhitungan','Status : '.$status)->autoClose(10000);
        }
        else{
            alert()->error('Hasil Perhitungan','Status : '.$status)->autoClose(10000);
        }
      
        return redirect()->route('perkegiatan', $kegiatanId);
    }



}
