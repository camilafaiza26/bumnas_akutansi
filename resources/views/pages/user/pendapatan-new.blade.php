<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Mengisi Pendapatan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('rencanakegiatan') }}">Rencana Kegiatan</a></div>
            
            <div class="breadcrumb-item"><a  href="{{ route('datakeuangan', $kegiatanId) }}">Pendapatan</a></div>
            <div class="breadcrumb-item active"><a> Masukkan Pendapatan</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-pendapatan action="createPendapatan"  kegiatanId="{{$kegiatanId}}" waktu="{{$waktu}}" />
    </div>
</x-app-layout>
