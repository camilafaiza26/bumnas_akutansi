<?php

namespace App\Http\Livewire;

use App\Http\Controllers\PendapatanController;
use App\Models\Bidang;
use App\Models\Bunga;
use App\Models\Kegiatan;
use App\Models\pendapatan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreatePendapatan extends Component
{
    public $pendapatan;
    public $pendapatanId;
    public $kegiatanId;
    public $action;
    public $button;
    public $waktu;

    // public $inputs = [];
    // public $i = 1;


    // public function add($i)
    // {
    //     $i = $i + 1;
    //     $this->i = $i;
    //     array_push($this->inputs ,$i);
    // }
 
    // public function remove($i)
    // {
    //     unset($this->inputs[$i]);
    // }
 
    protected function getRules()
    {
        return[

            'pendapatan.jumlah_pendapatan.*' => 'required',
            'pendapatan.tahun_ke.*' => 'required',
        ];
     
    }

    public function createPendapatan ()
    {

        $this->resetErrorBag();
        $this->validate();

        // $userIdT = Auth::user()->id;
        // $this->kegiatan['user_id'] = $userIdT;

        $kegiatanIdN = $this->kegiatanId;
        $bungaIdN = $this->pendapatan['bunga_id'];

        foreach ($this->pendapatan['jumlah_pendapatan'] as $key => $value) {
            Pendapatan::create(['jumlah_pendapatan' => $this->pendapatan['jumlah_pendapatan'][$key], 
            'tahun_ke' => $this->pendapatan['tahun_ke'][$key], 
            'bunga_id' => $bungaIdN,
            'kegiatan_id' => $kegiatanIdN ]);
        }

        $this->emit('saved');
        $this->reset('pendapatan');
    }

   
    // public function updatePendapatan ()
    // {
    //     $this->resetErrorBag();
    //     $this->validate();

        
    //     // $userIdT = Auth::user()->id;
    //     // $this->tegiatan['user_id'] = $userIdT;

        
    //     pendapatan::query()
    //         ->where('id', $this->pendapatanId)
    //         ->update([
    //             "nama_pendapatan" => $this->pendapatan->nama_pendapatan,
    //             "waktu_pendapatan" => $this->pendapatan->waktu_pendapatan,
    //             "bidang_id" => $this->pendapatan->bidang_id,
    //         ]);

    //     $this->emit('saved');
    // }

    public function mount ()
    {
        if (!$this->pendapatan && $this->pendapatanId) {
            $this->pendapatan = Pendapatan::find($this->pendapatanId);
        }

        $waktusArray = range(1, $this->waktu);

        foreach ($waktusArray as $key => $value) {
            $this->pendapatan['tahun_ke'][$value]= $value;
        };


        $this->button = create_button($this->action, "Pendapatan");
    }

    public function render()
    {
        
        return view('livewire.create-pendapatan', [
            'bungas' => Bunga::all(),
            
        ]);
    }
}
