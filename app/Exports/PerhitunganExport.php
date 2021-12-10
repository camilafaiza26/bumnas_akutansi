<?php

namespace App\Exports;

use App\Models\Perhitungan;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

class PerhitunganExport implements FromCollection, WithHeadings,WithMapping, ShouldAutoSize,WithColumnFormatting
{
    
    public function headings():array{
        return[
            'Tanggal Perhitungan',
            'Pendapatan',
            'Total Biaya Variable',
            'Total Biaya Semi',
            'Total Biaya Tetap',
            'Initial Outlay',
            'Waktu (Tahun)',
            'Bunga (%)',
            'NPV',
            'Status',
        ];
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $id = Auth::user()->id;
        return Perhitungan::select('perhitungans.created_at','perhitungans.pendapatan',
        'perhitungans.total_variable','perhitungans.total_semi','perhitungans.total_tetap','perhitungans.initial_outlay',
        'perhitungans.waktu', 'bungas.bunga','perhitungans.npv',
       'perhitungans.status')
        ->join('bungas','bungas.id_bunga', '=', 'perhitungans.bunga_id')
        ->where('perhitungans.user_id', $id)->get();
    }

    public function map($perhitungan) : array{
        return[
            $perhitungan->created_at,
            $perhitungan->pendapatan,
            $perhitungan->total_variable,
            $perhitungan->total_semi,
            $perhitungan->total_tetap,
            $perhitungan->initial_outlay,
            $perhitungan->waktu,
            $perhitungan->bunga,
            $perhitungan->npv,
            $perhitungan->status
        ];

    }
    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'C' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'D' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'E' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'F' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
            'I' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,

        ];
    }
}
