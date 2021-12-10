<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Variable') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('variable') }}">Biaya Variable</a></div>
            <div class="breadcrumb-item"><a href="#">Edit Variable</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-variable action="updateVariable" :variableId="request()->variableId" />
    </div>
</x-app-layout>
