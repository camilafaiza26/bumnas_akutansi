<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Rencana Kegiatan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('rencanakegiatan') }}">Rencana Kegiatan</a></div>
            <div class="breadcrumb-item">Edit Rencana Kegiatan </div>
        </div>
    </x-slot>

    <div>
        <livewire:create-kegiatan action="updateKegiatan" :kegiatanId="request()->kegiatanId" />
    </div>
</x-app-layout>
