<?php

namespace App\Http\Livewire;

use App\Models\Tetap;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateTetap extends Component
{
    public $tetap;
    public $tetapId;
    public $action;
    public $kegiatanId;
    public $button;

    protected function getRules()
    {
    
        return[
            'tetap.namaT' => 'required',
            'tetap.hargaT' => 'required',
            'tetap.ketT' => 'max:500',
        ];
    }

    public function createTetap ()
    {
        $this->resetErrorBag();
        $this->validate();

        $userIdT = Auth::user()->id;
        $this->tetap['user_id'] = $userIdT;

        $kegiatanIdN = $this->kegiatanId;
        $this->tetap['kegiatan_id'] = $kegiatanIdN;

        $input = $this->tetap['hargaT'];
        $harga = preg_replace("/[^0-9]/", "", $input); 
        $this->tetap['hargaT'] = $harga;

        Tetap::create($this->tetap);
        $this->emit('saved');
        $this->reset('tetap');
    }

    public function updateTetap ()
    {
        $this->resetErrorBag();
        $this->validate();

        
        $userIdT = Auth::user()->id;
        $this->tetap['user_id'] = $userIdT;

        $input =   $this->tetap['hargaT'];
        $harga = preg_replace("/[^0-9]/", "", $input); 
        $this->tetap['hargaT'] = $harga;
        
        Tetap::query()
            ->where('id', $this->tetapId)
            ->update([
                "user_id" => $this->tetap->user_id,
                "namaT" => $this->tetap->namaT,
                "hargaT" => $this->tetap->hargaT,
                "ketT" => $this->tetap->ketT,
            ]);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->tetap && $this->tetapId) {
            $this->tetap = Tetap::find($this->tetapId);
        }

        $this->button = create_button($this->action, "Tetap");
    }

    public function render()
    {
        return view('livewire.create-tetap');
    }
}
