<?php

namespace App\Http\Livewire;

use App\Models\Perhitungan;
use App\Models\Variable;
use App\Models\Bunga;
use App\Models\Semi;
use App\Models\Tetap;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreatePerhitungan extends Component
{
    public $perhitungan;
    public $perhitunganId;
  
    public $tempNPV;
    public $jumlahNPV=0;
    public $action;
    public $button;

    protected function getRules()
    {
        return[
            'perhitungan.pendapatan' => 'required',
            'perhitungan.waktu' => 'required',
            'perhitungan.bunga_id' => 'required',
            'perhitungan.initial_outlay' => 'required',
            'perhitungan.total_semi' => 'required',
            'perhitungan.total_variable' => 'required',
            'perhitungan.total_tetap' => 'required',
        ];
    }

    public function npvValue($pendapatan, $bunga, $waktu, $initial_outlay ){

        foreach (range(1,$waktu) as $i) {
            $this->tempNPV = ($pendapatan/pow((1+($bunga*0.1)),$i))- $initial_outlay;
            $this->jumlahNPV += $this->tempNPV;
        }
        return $this->jumlahNPV;
    }

    public function createPerhitungan ()
    {
        $this->resetErrorBag();
        $this->validate();

        $userIdT = Auth::user()->id;
        $this->perhitungan['user_id'] = $userIdT;

        $valueTotalVariable =   $this->perhitungan['total_variable'];
        $formatTotalVariable = preg_replace("/[^0-9]/", "", $valueTotalVariable); 
        $this->perhitungan['total_variable'] = $formatTotalVariable;

        $valueTotalSemi =   $this->perhitungan['total_semi'];
        $formatTotalSemi= preg_replace("/[^0-9]/", "", $valueTotalSemi); 
        $this->perhitungan['total_semi'] =  $formatTotalSemi;

        $valueTotalTetap =   $this->perhitungan['total_tetap'];
        $formatTotalTetap = preg_replace("/[^0-9]/", "",$valueTotalTetap); 
        $this->perhitungan['total_tetap'] = $formatTotalTetap;

        $valueInitialOutlay  =   $this->perhitungan['initial_outlay'];
        $formatInitial = preg_replace("/[^0-9]/", "", $valueInitialOutlay ); 
        $this->perhitungan['initial_outlay'] = $formatInitial;
        
        $pendapatan =   $this->perhitungan['pendapatan'];
        $hargaPendapatan = preg_replace("/[^0-9]/", "", $pendapatan); 
        $this->perhitungan['pendapatan'] = $hargaPendapatan;


        $bunga = $this->perhitungan['bunga_id'];
        $bungaNPV_temp = Bunga::select('bunga')->where('id_bunga', $bunga)->first();
        $bungaNPV = $bungaNPV_temp->id_bunga;
        $waktuNPV = $this->perhitungan['waktu'];
     

        //($pendapatan, $bunga, $waktu, $initial_outlay )
        $NPV = $this->npvValue($hargaPendapatan,$bungaNPV,$waktuNPV,$formatInitial);
        $this->perhitungan['npv'] =   $NPV;

        if($NPV < 0){
        $this->perhitungan['status'] = "Rugi";
        }
        else{
            $this->perhitungan['status'] = "Untung";
        }
        
        Perhitungan::create($this->perhitungan);
        $this->emit('saved');
        $this->reset('perhitungan');
    }

    public function updatePerhitungan ()
    {
        $this->resetErrorBag();
        $this->validate();

        
        $userIdT = Auth::user()->id;
        $this->perhitungan['user_id'] = $userIdT;

        $valueTotalVariable =   $this->perhitungan['total_variable'];
        $formatTotalVariable = preg_replace("/[^0-9]/", "", $valueTotalVariable); 
        $this->perhitungan['total_variable'] = $formatTotalVariable;

        $valueTotalSemi =   $this->perhitungan['total_semi'];
        $formatTotalSemi= preg_replace("/[^0-9]/", "", $valueTotalSemi); 
        $this->perhitungan['total_semi'] =  $formatTotalSemi;

        $valueTotalTetap =   $this->perhitungan['total_tetap'];
        $formatTotalTetap = preg_replace("/[^0-9]/", "",$valueTotalTetap); 
        $this->perhitungan['total_tetap'] = $formatTotalTetap;

        $valueInitialOutlay  =   $this->perhitungan['initial_outlay'];
        $formatInitial = preg_replace("/[^0-9]/", "", $valueInitialOutlay ); 
        $this->perhitungan['initial_outlay'] = $formatInitial;
        
        $pendapatan =   $this->perhitungan['pendapatan'];
        $hargaPendapatan = preg_replace("/[^0-9]/", "", $pendapatan); 
        $this->perhitungan['pendapatan'] = $hargaPendapatan;


        $bunga = $this->perhitungan['bunga_id'];
        $bungaNPV_temp = Bunga::select('bunga')->where('id_bunga', $bunga)->first();
        $bungaNPV = $bungaNPV_temp->id_bunga;
        $waktuNPV = $this->perhitungan['waktu'];
     

        //($pendapatan, $bunga, $waktu, $initial_outlay )
        $NPV = $this->npvValue($hargaPendapatan,$bungaNPV,$waktuNPV,$formatInitial);
        $this->perhitungan['npv'] =   $NPV;

        if($NPV < 0){
        $this->perhitungan['status'] = "Rugi";
        }
        else{
            $this->perhitungan['status'] = "Untung";
        }
        
        Perhitungan::query()
            ->where('id', $this->perhitunganId)
            ->update([
                "user_id" => $this->perhitungan->user_id,
                "pendapatan" => $this->perhitungan->pendapatan,
                "bunga_id" => $this->perhitungan->bunga_id,
                "waktu" => $this->perhitungan->waktu,
                "initial_outlay" => $this->perhitungan->initial_outlay,
                "total_variable" => $this->perhitungan->total_variable,
                "total_semi" => $this->perhitungan->total_semi,
                "total_tetap" => $this->perhitungan->total_tetap,
                "npv" => $this->perhitungan->npv,
                "status" => $this->perhitungan->status,
            ]);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!$this->perhitungan && $this->perhitunganId) {
            $this->perhitungan = Perhitungan::find($this->perhitunganId);
        }

        $this->button = create_button($this->action, "Perhitungan");

        if($this->perhitunganId==NULL){
            $userId = Auth::user()->id;

            $valueVariable = Variable::select('hargaV')->where('user_id',$userId)->sum('hargaV');
            $valueSemi = Semi::select('hargaS')->where('user_id',$userId)->sum('hargaS');
             $valueTetap = Tetap::select('hargaT')->where('user_id',$userId)->sum('hargaT');

            $valueInitial = $valueVariable +  $valueSemi + $valueTetap;

            $this->perhitungan['created_at'] = NULL;
            $this->perhitungan['total_variable'] =  number_format($valueVariable,0,',','.');
            $this->perhitungan['total_semi']= number_format($valueSemi,0,',','.');
            $this->perhitungan['total_tetap']= number_format($valueTetap,0,',','.');
            $this->perhitungan['initial_outlay']= number_format($valueInitial,0,',','.');
        }
    }

    public function render()
    {
        return view('livewire.create-perhitungan', [
            'bungas' => Bunga::all(),
        ]);
    }
}
