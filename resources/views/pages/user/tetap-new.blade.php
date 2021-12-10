<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Biaya Tetap Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('tetap', $kegiatanId) }}">Biaya Tetap</a></div> 
            <div class="breadcrumb-item active">Buat Biaya Tetap Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-tetap action="createTetap" kegiatanId="{{$kegiatanId}}"  />
    </div>
</x-app-layout>
