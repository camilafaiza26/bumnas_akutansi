<x-app-layout>
    @include('sweetalert::alert')
    <x-slot name="header_content">
        <h1>Data Kalkukasi Rencana Kegiatan</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item "><a <a href="{{ route('rencanakegiatan') }}">Rencana Kegiatan</a></div>
            <div class="breadcrumb-item active"><a>Perhitungan</a></div>
        </div>
        
    </x-slot>
    <div class="bg-white h-screen p-10">

        <h1 class="text-center text-2xl text-blue-500 mb-2"> Data Keuangan  </h1>
        <h1 class="text-center text-2xl text-blue-500 mb-2">Rencana Kegiatan {{$kegiatanInHere->nama_kegiatan}}</h1>
      
     
        <p class="mt-2 text-left px-2 float-left">Tanggal Perhitungan : {{\Carbon\Carbon::now("Asia/Jakarta")->format('D, d-m-Y')}} </p>
        <a role="button" href=""  class="no-underline mr-2 mt-2 mb-2 float-right bg-green-400 text-white hover:bg-green-600 hover:no-underline  font-bold py-2 px-4 border border-blue-700 rounded">Export</a> 
     
        
        <div class="flex mt-2 clear-both">
            <table class="w-1/3 border-collapse border border-gray-400 m-2">
                <thead class="bg-white">
                    <tr class="border-b border-gray-300">
                        <th class="text-center px-6 py-2 text-sm text-blue-500" colspan="2">
                           Rincian Informasi Rencana Kegiatan
                        </th>
                    </tr>
                </thead>
                <tbody >
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-500 border border-gray-200 ">
                            Rencana Kegiatan
                        </td>  
                        <td class="px-4 py-2 text-sm text-blue-600 border border-gray-200  text-right">
                           {{$kegiatanInHere->nama_kegiatan}}
                        </td>                                
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-500 border border-gray-200 ">
                            Waktu Kegiatan
                        </td>  
                        <td class="px-4 py-2 text-sm text-blue-600 border border-gray-200  text-right">
                           {{$kegiatanInHere->waktu_kegiatan}} Tahun
                        </td>                                
                    </tr>
                    <tr>
                        <td class="px-4 py-2 text-sm text-gray-500 border border-gray-200 ">
                            Bidang Rencana Kegiatan
                        </td>  
                        <td class="px-4 py-2 text-sm text-blue-600 border border-gray-200  text-right">
                           {{$kegiatanInHere->nama_bidang}}
                        </td>                                
                    </tr>
                </tbody>
            </table>
                  
                        <table class="w-2/3 border-collapse border border-gray-400 m-2">
                            <thead class="bg-white">
                                <tr class="border-b border-gray-300">
                                    <th class="text-center px-6 py-2 text-sm text-blue-500" colspan="2">
                                       Total Pendapatan
                                    </th>
                                </tr>
                                <tr class="border border-gray-300" >
                                    <th class="text-center px-6 py-2 text-sm text-blue-500 border border-gray-200" >
                                       Tahun-Ke
                                    </th>
                                    
                                    <th class="text-center px-6 py-2 text-sm text-blue-500 border border-gray-200">
                                       Biaya
                                     </th>
                                     <th class="text-center px-6 py-2 text-sm text-blue-500 border border-gray-200" >
                                        Bunga
                                     </th>
                                </tr>
                            </thead>
                          
                            <tbody >
                                @foreach($pendapatans as $pendapatan)
                            
                                <tr >
                                    <td class="px-4 py-2 text-sm text-gray-500 border border-gray-200 ">
                                        Pendapatan Tahun Ke- {{$pendapatan->tahun_ke}}
                                    </td>
                                    <td class="px-4 py-2 text-sm text-gray-900 border border-gray-200 text-right">
                                        Rp{{ number_format($pendapatan->jumlah_pendapatan,2,',','.') }}
                                    </td>  
                                    <td class="px-4 py-2 text-sm text-gray-900 border border-gray-200 text-right">
                                       {{$pendapatan->bunga}}%
                                    </td>                                  
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-500 border border-gray-200 text-blue-500">
                                        Jumlah Pendapatan 
                                    </td>  
                                    <td class="px-4 py-2 text-sm text-blue-600 border border-gray-200  text-right">
                                        Rp{{ number_format($pendapatans->sum('jumlah_pendapatan'),2,',','.')}}
                                    </td>                                
                                </tr>
                              
                            </tbody>
                        </table>
        </div>
      
        <div class="flex">
                        <table class="w-1/3 border-collapse border border-gray-400 m-2 ">
                            <thead class="bg-white">
                                <tr class="border-b border-gray-300">
                                    <th class="text-center px-6 py-2 text-sm text-blue-500" colspan="2">
                                       Total Biaya Variabel
                                    </th>
                                </tr>
                                <tr class="border-b border-gray-300" >
                                    <th class="text-center px-6 py-2 text-sm text-blue-500 border border-gray-200" >
                                       Nama Biaya
                                    </th>
                                    <th class="text-center px-6 py-2 text-sm text-blue-500 border border-gray-200">
                                       Biaya
                                     </th>
                                </tr>
                                
                            </thead>
                          
                            <tbody class="">
                                @foreach($variables as $variable)
                                <tr class="" >
                                    <td class="px-4 py-2 text-sm text-gray-500 border border-gray-200 ">
                                        {{$variable->namaV}}
                                    </td>
                                    <td class="px-4 py-2 text-sm text-gray-900 border border-gray-200 text-right">
                                        Rp{{ number_format($variable->hargaV,2,',','.') }}
                                    </td>                                   
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-500 border border-gray-200 text-blue-500">
                                        Jumlah Biaya Variabel
                                    </td>  
                                    <td class="px-4 py-2 text-sm text-blue-600 border border-gray-200  text-right">
                                        Rp{{ number_format($variables->sum('hargaV'),2,',','.')}}
                                    </td>                                
                                </tr>
                            </tbody>
                        </table>
       
                        <table class="w-1/3 border-collapse border border-gray-400 m-2 ">
                            <thead class="bg-white">
                                <tr class="border-b border-gray-300">
                                    <th class="text-center px-6 py-2 text-sm text-blue-500" colspan="2">
                                       Total Biaya Semi Variabel
                                    </th>
                                </tr>
                                <tr class="border-b border-gray-300" >
                                    <th class="text-center px-6 py-2 text-sm text-blue-500 border border-gray-200" >
                                       Nama Biaya 
                                    </th>
                                    <th class="text-center px-6 py-2 text-sm text-blue-500 border border-gray-200">
                                       Biaya
                                     </th>
                                </tr>
                                
                            </thead>
                          
                            <tbody class="">
                                @foreach($semis as $semi)
                                <tr class="" >
                                    <td class="px-4 py-2 text-sm text-gray-500 border border-gray-200 ">
                                        {{$semi->namaS}}
                                    </td>
                                    <td class="px-4 py-2 text-sm text-gray-900 border border-gray-200 text-right">
                                        Rp{{ number_format($semi->hargaS,2,',','.') }}
                                    </td>                                   
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-500 border border-gray-200 text-blue-500">
                                        Jumlah Biaya Semi Variabel
                                    </td>  
                                    <td class="px-4 py-2 text-sm text-blue-600 border border-gray-200  text-right">
                                        Rp{{ number_format($semis->sum('hargaS'),2,',','.')}}
                                    </td>                                
                                </tr>
                            </tbody>
                        </table>

                        <table class="w-1/3 border-collapse border border-gray-400 m-2 ">
                            <thead class="bg-white">
                                <tr class="border-b border-gray-300">
                                    <th class="text-center px-6 py-2 text-sm text-blue-500" colspan="2">
                                       Total Biaya Tetap
                                    </th>
                                </tr>
                                <tr class="border-b border-gray-300" >
                                    <th class="text-center px-6 py-2 text-sm text-blue-500 border border-gray-200" >
                                       Nama Biaya 
                                    </th>
                                    <th class="text-center px-6 py-2 text-sm text-blue-500 border border-gray-200">
                                       Biaya
                                     </th>
                                </tr>
                                
                            </thead>
                          
                            <tbody class="">
                                @foreach($tetaps as $tetap)
                                <tr class="" >
                                    <td class="px-4 py-2 text-sm text-gray-500 border border-gray-200 ">
                                        {{$tetap->namaT}}
                                    </td>
                                    <td class="px-4 py-2 text-sm text-gray-900 border border-gray-200 text-right">
                                        Rp{{ number_format($tetap->hargaT,2,',','.') }}
                                    </td>                                   
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="px-4 py-2 text-sm text-gray-500 border border-gray-200 text-blue-500">
                                        Jumlah Biaya Tetap
                                    </td>  
                                    <td class="px-4 py-2 text-sm text-blue-600 border border-gray-200  text-right">
                                        Rp{{ number_format($tetaps->sum('hargaT'),2,',','.')}}
                                    </td>                                
                                </tr>
                            </tbody>
                        </table>
        </div>
        
        <p class="mt-2 ml-2"> *Note : Data yang diisikan sudah cocok benar untuk melakukan perhitungan. Jika belum, silahkan ulang kembali</p>
        
        {{-- <form id="form_id" method="POST" action="{{Route('kalkulasi.store', $kegiatanId)}}">
            @csrf
            <button type="submit" class=" confirm no-underline mt-1 float-right bg-blue-700 text-white hover:bg-green-500 hover:no-underline  font-bold py-2 px-4 border border-blue-700 rounded">Lakukan Perhitungan</button>
          </form>  --}}
        
        <a  href="{{route ('kalkulasi.konfirm', $kegiatanId)}}"  class="no-underline mt-1 float-right bg-blue-700 text-white hover:bg-green-500 hover:no-underline  font-bold py-2 px-4 border border-blue-700 rounded"> Lakukan Perhitungan </a> 

     
    </div>
    
</x-app-layout>
