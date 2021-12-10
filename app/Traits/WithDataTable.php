<?php

namespace App\Traits;
use App\Models\Variable;
use Illuminate\Support\Facades\Auth;

trait WithDataTable {
    
    public function get_pagination_data ()
    {
        switch ($this->name) {
            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => 'Buat User Baru',
                            'export' => '#',
                            'export_text' => 'Export'
                        ]
                    ])
                ];
              
                break;
                

                case 'variable':
                    // $userId = Auth::user()->id;
                    $variables = $this->model::search($this->search)
                        // ->where('user_id', $userId)
                        ->where('kegiatan_id', $this->kegiatanId)
                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                        ->paginate($this->perPage);
                
                    return [
                        "view" => 'livewire.table.variable',
                        "variables" => $variables,
                        "data" => array_to_object([
                            'href' => [
                                'create_new' => 'variable/new',
                                'create_new_text' => 'Buat Biaya Variabel Baru',
                                'export' => '#',
                                'export_text' => 'Export'
                            ]
                        ])
                    ];
                    break;
                
                    case 'tetap':
                        // $userId = Auth::user()->id;
                        $tetaps = $this->model::search($this->search)
                            // ->where('user_id', $userId)
                            ->where('kegiatan_id', $this->kegiatanId)
                            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                            ->paginate($this->perPage);
        
                        return [
                            "view" => 'livewire.table.tetap',
                            "tetaps" => $tetaps,
                            "data" => array_to_object([
                                'href' => [
                                    'create_new' => 'tetap/new',
                                    'create_new_text' => 'Buat Biaya Tetap Baru',
                                    'export' => '#',
                                    'export_text' => 'Export'
                                ]
                            ])
                        ];
                        break;
                        case 'semi':
                            // $userId= Auth::user()->id;
                            $semis = $this->model::search($this->search)
                                //  ->where('user_id', $userId)
                                 ->where('kegiatan_id', $this->kegiatanId)
                                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                                ->paginate($this->perPage);
            
                            return [
                                "view" => 'livewire.table.semi',
                                "semis" => $semis,
                                "data" => array_to_object([
                                    'href' => [
                                        'create_new' => 'semi/new',
                                        'create_new_text' => 'Buat Biaya Semi Variabel Baru',
                                        'export' => '#',
                                        'export_text' => 'Export'
                                    ]
                                ])
                            ];
                            break;

                            case 'perhitungan':
                                $userId= Auth::user()->id;
                                $perhitungans = $this->model::search($this->search)
                                    ->join('bungas', 'bungas.id_bunga', '=', 'perhitungans.bunga_id')
                                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                                    ->paginate($this->perPage);
                
                                return [
                                    "view" => 'livewire.table.perhitungan',
                                    "perhitungans" => $perhitungans,
                                    "data" => array_to_object([
                                        'href' => [
                                            'create_new' => route('rencanakegiatan'),
                                            'create_new_text' => 'Lakukan Perhitungan Baru',
                                            'export' => route('perhitungan.export'),
                                            'export_text' => 'Export'
                                        ]
                                    ])
                                ];
                                break;
                                

                                case 'kegiatan':
                                    // $userId= Auth::user()->id;
                                    $kegiatans = $this->model::search($this->search)
                                        //  ->where('user_id', $userId)
                                        ->join('bidangs', 'bidangs.id_bidang', '=', 'kegiatans.bidang_id')
                                        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                                        ->paginate($this->perPage);
                    
                                    return [
                                        "view" => 'livewire.table.kegiatan',
                                        "kegiatans" => $kegiatans,
                                        "data" => array_to_object([
                                            'href' => [
                                                'create_new' => route('rencanakegiatan.new'),
                                                'create_new_text' => 'Tambah Rencana Kegiatan',
                                                'export' => '#',
                                                'export_text' => 'Export'
                                            ]
                                        ])
                                    ];
                                    break;

                                    case 'pendapatan':
                                        // $userId= Auth::user()->id;
                                        $pendapatans = $this->model::search($this->search)
                                            ->join('bungas', 'bungas.id_bunga', '=', 'pendapatans.bunga_id')
                                            ->where('kegiatan_id', $this->kegiatanId)
                                            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                                            ->paginate($this->perPage);
                        
                                        return [
                                            "view" => 'livewire.table.pendapatan',
                                            "pendapatans" => $pendapatans,
                                            "data" => array_to_object([
                                                'href' => [
                                                    'create_new' => 'pendapatan/new',
                                                    'create_new_text' => 'Tambah Pendapatan',
                                                    'export' => '#',
                                                    'export_text' => 'Export'
                                                ]
                                            ])
                                        ];
                                        break;

                                        case 'perkegiatan':
                                          
                                            $perkegiatans = $this->model::search($this->search)
                                                ->join('bungas', 'bungas.id_bunga', '=', 'perhitungans.bunga_id')
                                                ->where('kegiatan_id', $this->kegiatanId)
                                                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                                                ->paginate($this->perPage);
                            
                                            return [
                                                "view" => 'livewire.table.perkegiatan',
                                                "perkegiatans" => $perkegiatans,
                                                "data" => array_to_object([
                                                    'href' => [
                                                        'create_new' => route('kalkulasi', $this->kegiatanId),
                                                        'create_new_text' => 'Lakukan Perhitungan Baru',
                                                        'export' => '#',
                                                        'export_text' => 'Export'
                                                    ]
                                                ])
                                            ];
                                            break;  

            default:
                # code...
                break;
        }
    }
}
