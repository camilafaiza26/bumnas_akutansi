<?php

namespace App\Http\Livewire;

use App\Models\Semi;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateSemi extends Component
{
    public $semi;
    public $semiId;
    public $action;
    public $kegiatanId;
    public $button;

    protected function getRules()
    {
        return[
            'semi.namaS' => 'required',
            'semi.hargaS' => 'required',
            'semi.ketS' => 'max:500',
        ];
    }

    public function createSemi ()
    {
        $this->resetErrorBag();
        $this->validate();

        $userId = Auth::user()->id;
        $this->semi['user_id'] = $userId;

        $kegiatanIdN = $this->kegiatanId;
        $this->semi['kegiatan_id'] = $kegiatanIdN;

        $input =   $this->semi['hargaS'];
        $harga = preg_replace("/[^0-9]/", "", $input); 
        $this->semi['hargaS'] = $harga;

        Semi::create($this->semi);

        $this->emit('saved');
        $this->reset('semi');
    }

    public function updateSemi ()
    {
        $this->resetErrorBag();
        $this->validate();

        
        $userId = Auth::user()->id;
        $this->semi['user_id'] = $userId; 

        $input =   $this->semi['hargaS'];
        $harga = preg_replace("/[^0-9]/", "", $input); 
        $this->semi['hargaS'] = $harga;

        Semi::query()
            ->where('id', $this->semiId)
            ->update([
                "user_id" => $this->semi->user_id,
                "namaS" => $this->semi->namaS,
                "hargaS" => $this->semi->hargaS,
                "ketS" => $this->semi->ketS,
            ]);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->semi && $this->semiId) {
            $this->semi = Semi::find($this->semiId);
        }

        $this->button = create_button($this->action, "Semi");
    }

    public function render()
    {
        return view('livewire.create-semi');
    }
}
