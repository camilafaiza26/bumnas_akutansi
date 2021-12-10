<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Biaya Tetap') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('tetap') }}">Biaya Tetap</a></div>
            <div class="breadcrumb-item">Edit Biaya Tetap</div>
        </div>
    </x-slot>

    <div>
        <livewire:create-tetap action="updateTetap" :tetapId="request()->tetapId" />
    </div>
</x-app-layout>
