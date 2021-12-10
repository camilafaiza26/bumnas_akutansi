<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Perhitungan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('perhitungan') }}">Riwayat Perhitungan</a></div>
            <div class="breadcrumb-item">Edit Perhitungan </div>
        </div>
    </x-slot>

    <div>
        <livewire:create-perhitungan action="updatePerhitungan" :perhitunganId="request()->perhitunganId" />
    </div>
</x-app-layout>
