<?php

namespace App\Http\Livewire;

use App\Models\Variable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class CreateVariable extends Component
{
    public $variable;
    public $variableId;
    public $kegiatanId;
    public $action;
    public $button;

    protected function getRules()
    {
        // $rules = ($this->action == "updateVariable") ? [
        //     'variable.namaV' => 'required',
        // ] : [
        //     'variable.hargaV' => 'required',
        // ];

        return[
            'variable.namaV' => 'required',
            'variable.hargaV' => 'required',
            'variable.ketV' => 'max:500',
        ];
    }

    public function createVariable ()
    {
        $this->resetErrorBag();
        $this->validate();

        $kegiatanIdN = $this->kegiatanId;
        $this->variable['kegiatan_id'] = $kegiatanIdN;

        $userId = Auth::user()->id;
        $this->variable['user_id'] = $userId;

        $input =   $this->variable['hargaV'];
        $harga = preg_replace("/[^0-9]/", "", $input); 
        $this->variable['hargaV'] = $harga;
     

        Variable::create($this->variable);

        $this->emit('saved');
        $this->reset('variable');
    }

    public function updateVariable ()
    {
        $this->resetErrorBag();
        $this->validate();

        
        $input =   $this->variable['hargaV'];
        $harga = preg_replace("/[^0-9]/", "", $input); 
        $this->variable['hargaV'] = $harga;

        $userId = Auth::user()->id;
        $this->variable['user_id'] = $userId;

        Variable::query()
            ->where('id', $this->variableId)
            ->update([
                "user_id" => $this->variable->user_id,
                "namaV" => $this->variable->namaV,
                "hargaV" => $this->variable->hargaV,
                "ketV" => $this->variable->ketV,
            ]);

        $this->emit('saved');
    }
   

    public function mount ()
    {
        if (!$this->variable && $this->variableId) {
            $this->variable = Variable::find($this->variableId);
        }

        $this->button = create_button($this->action, "Variable");
    }

    public function render()
    {
        return view('livewire.create-variable');
    }
}
