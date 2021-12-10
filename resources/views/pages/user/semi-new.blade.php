<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Buat Biaya Semi Variabel Baru') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('semi', $kegiatanId) }}">Biaya Semi Variabel</a></div>
            <div class="breadcrumb-item active"><a>Buat Biaya Semi Variabel Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-semi action="createSemi" kegiatanId="{{$kegiatanId}}" />
    </div>
</x-app-layout>
