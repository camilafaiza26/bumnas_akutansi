<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Keuangan Kegiatan') }} : {{$kegiatanNama}}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('rencanakegiatan') }}">Rencana Kegiatan</a></div>
            <div class="breadcrumb-item active">Data Keuangan</a></div>
            <div class="breadcrumb-item active">Biaya Variabel</a></div>
            
        </div>
    </x-slot>

    <div x-data="{ 
        activeTab:2,
        activeClass: 'text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 font-medium border-blue-500',
        inactiveClass : 'text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none ',
        }" >
        <div class="bg-white">
            <nav class="flex flex-col sm:flex-row">
                <button  onclick="location.href='{{ route('datakeuangan', $kegiatanId) }}'"  :class="activeTab === 1 ? activeClass : inactiveClass"   >
                    <p class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100"> Biaya Pendapatan</p> 
                </button>
                    
                  <button  href="" x-on:click="activeTab = 2" :class="activeTab === 2 ? activeClass : inactiveClass">
                    <p class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100"> 
                    Biaya Variabel </p>
                </button>
                <button onclick="location.href='{{ route('semi', $kegiatanId) }}'" :class="activeTab === 3 ? activeClass : inactiveClass">
                    <p class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100"> 
                    Biaya Semi Variable </p>
                </button>
                <button  onclick="location.href='{{ route('tetap', $kegiatanId) }}'" :class="activeTab === 4 ? activeClass : inactiveClass" >
                    <p class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100">  
                         Biaya Tetap </p>
                </button>
            </nav>
        </div>
        <div class="mt-6 bg-white border p-3 ">
           

            {{-- <div x-show="activeTab === 1" wire:ignore.self> 
                <div id="pendapatan">    
                <livewire:table.main name="pendapatan" :model="$pendapatan" kegiatanId="{{$kegiatanId}}"   /> 
              
                </div>
            </div>  --}}
            
            <div x-show="activeTab === 2" >
                <div id="variable">
                <livewire:table.main name="variable" :model="$variable" kegiatanId="{{$kegiatanId}}" />
                </div>
            </div>
            
            {{-- <div x-show="activeTab === 3"  wire:ignore.self >
                <div id="semi">
                <livewire:table.main name="semi" :model="$semi" kegiatanId="{{$kegiatanId}}" />
                </div>
            </div>
           
            <div x-show="activeTab === 4" wire:ignore.self>
                <div id="tetap">
                    <livewire:table.main name="tetap" :model="$tetap" kegiatanId="{{$kegiatanId}}" />
                </div>
            </div>  --}}
        </div>
    </div>     

  
<script>

var pendapatanR = document.getElementById('pendapatan');
var variableR = document.getElementById('variable');
var semiR = document.getElementById('semi');
var tetapR = document.getElementById('tetap');



    </script>

</x-app-layout>
