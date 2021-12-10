<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Biaya Semi Variabel') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            {{-- <div class="breadcrumb-item"><a href="{{ route('semi') }}">Biaya Semi Variabel</a></div> --}}
            <div class="breadcrumb-item active">Edit Biaya Semi Variabel</div>
        </div>
    </x-slot>

    <div>
        <livewire:create-semi action="updateSemi" :semiId="request()->semiId" />
    </div>
</x-app-layout>
