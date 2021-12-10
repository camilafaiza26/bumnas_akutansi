<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Tambah Rencana Kegiatan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item "><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="{{ route('rencanakegiatan') }}">Reancana Kegiatan</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-kegiatan action="createKegiatan" />
    </div>
</x-app-layout>
