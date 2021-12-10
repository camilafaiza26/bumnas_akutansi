<x-app-layout>
    <x-slot name="header_content">
        <h1>Data Perhitungan {{$kegiatanNama}}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item "><a href="{{ route('rencanakegiatan') }}">Rencana Kegiatan</a></div>
            <div class="breadcrumb-item active ">Perhitungan {{$kegiatanNama}}</a></div>
        </div>
    </x-slot>

    <div>
        
    </div>
    <div>
        <livewire:table.main name="perkegiatan" :model="$perkegiatan"  kegiatanId="{{$kegiatanId}}" />
    </div>
</x-app-layout>
