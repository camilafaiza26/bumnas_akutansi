<x-app-layout>
 
    <x-slot name="header_content">
        <h1>{{ __('Data Rencana Kegiatan') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item active"><a>Rencana Kegiatan</a></div>
        </div>
        
    </x-slot>

    <div>
        <livewire:table.main name="kegiatan" :model="$kegiatan"  />
    </div>

</x-app-layout>
