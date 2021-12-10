<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Perhitungan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('perhitungan') }}">Perhitungan</a></div>
            <div class="breadcrumb-item"><a href="{{ route('perhitungan.new') }}">Lakukan Perhitungan Baru</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-perhitungan action="createPerhitungan" />
    </div>
</x-app-layout>
