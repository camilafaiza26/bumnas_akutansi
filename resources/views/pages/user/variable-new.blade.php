<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Biaya Variabel Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{ route('dashboard') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ route('rencanakegiatan') }}">Rencana Kegiatan</a></div>
            <div class="breadcrumb-item"><a href="{{ route('datakeuangan', $kegiatanId) }}">Data Keuangan</a></div>
            <div class="breadcrumb-item active"><a>Buat Biaya Variabel Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-variable action="createVariable" kegiatanId="{{$kegiatanId}}"/>
    </div>
</x-app-layout>
