<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Data Keuangan Kegiatan') }} : {{$kegiatanNama}}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('rencanakegiatan') }}">Rencana Kegiatan</a></div>
            <div class="breadcrumb-item active"><a> Data Keuangan</a></div>
            <div class="breadcrumb-item active"><a> Biaya Semi Variabel</a></div>
        </div>
    </x-slot>

    <div x-data="{ 
        activeTab:3,
        activeClass: 'text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 font-medium border-blue-500',
        inactiveClass : 'text-gray-600 py-4 px-6 block hover:text-blue-500 focus:outline-none ',
        }" >
        <div class="bg-white">
            <nav class="flex flex-col sm:flex-row">
                <button onclick="location.href='{{ route('datakeuangan', $kegiatanId) }}'"  :class="activeTab === 1 ? activeClass : inactiveClass"   >
                    <p class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100"> Biaya Pendapatan</p> 
                </button>
                    
                  <button   onclick="location.href='{{ route('variable', $kegiatanId) }}'"  :class="activeTab === 2 ? activeClass : inactiveClass">
                    <p class="transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-100"> 
                    Biaya Variabel </p>
                </button>

                <button href="#" x-on:click="activeTab = 3" :class="activeTab === 3 ? activeClass : inactiveClass">
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
   
            <div x-show="activeTab === 3" >
                <livewire:table.main name="semi" :model="$semi" kegiatanId="{{$kegiatanId}}" />
            </div>
        

</x-app-layout>
