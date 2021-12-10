<?php

namespace App\Http\Livewire;

use App\Models\Bidang;
use App\Models\Kegiatan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateKegiatan extends Component
{
    public $kegiatan;
    public $kegiatanId;
    public $action;
    public $button;

    public $isOpen = 0;

    protected function getRules()
    {

        return[
            'kegiatan.nama_kegiatan' => 'required',
            'kegiatan.waktu_kegiatan' => 'required',
            'kegiatan.bidang_id' => 'required',
        ];
    }

    public function createKegiatan ()
    {
        $this->resetErrorBag();
        $this->validate();

        // $userIdT = Auth::user()->id;
        // $this->kegiatan['user_id'] = $userIdT;

      
        Kegiatan::create($this->kegiatan);
        
        
        $this->emit('saved');
        $this->reset('kegiatan');
    }

    public function updateKegiatan ()
    {
        $this->resetErrorBag();
        $this->validate();

        
        // $userIdT = Auth::user()->id;
        // $this->tegiatan['user_id'] = $userIdT;

        
        Kegiatan::query()
            ->where('id', $this->kegiatanId)
            ->update([
                "nama_kegiatan" => $this->kegiatan->nama_kegiatan,
                "waktu_kegiatan" => $this->kegiatan->waktu_kegiatan,
                "bidang_id" => $this->kegiatan->bidang_id,
            ]);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->kegiatan && $this->kegiatanId) {
            $this->kegiatan = Kegiatan::find($this->kegiatanId);
        }

        $this->button = create_button($this->action, "Kegiatan");
    }

    public function render()
    {
        return view('livewire.create-kegiatan', [
            'bidangs' => Bidang::all(),
        ]);
    }
}
