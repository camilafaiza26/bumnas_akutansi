<div>
    <x-data-table :data="$data" :model="$kegiatans">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    No
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nama_kegiatan')" role="button" href="#">
                    Nama Kegiatan
                    @include('components.sort-icon', ['field' => 'nama_kegiatan'])
                </a></th>    
                <th><a wire:click.prevent="sortBy('waktu_kegiatan')" role="button" href="#">
                    Waktu Kegiatan
                    @include('components.sort-icon', ['field' => 'waktu_kegiatan'])
                </a></th>
                <th><a wire:click.prevent="sortBy('nama_bidang')" role="button" href="#">
                   Bidang Kegiatan
                    @include('components.sort-icon', ['field' => 'nama_bidang'])
                </a></th>
                <th class="text-center">Perhitungan</th>  
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($kegiatans as $kegiatan)
                <tr x-data="window.__controller.dataTableController({{ $kegiatan->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kegiatan->nama_kegiatan}}</td>
                    <td>{{ $kegiatan->waktu_kegiatan}} tahun</td>
                    {{-- <td>{{ $kegiatan->created_at->format('d M Y H:i') }}</td> --}}
                    <td>{{ $kegiatan->nama_bidang}}</td>
                    <td class="text-center">
                    <a href="/rencanakegiatan/{{ $kegiatan->id }}/pendapatan"  class="-ml- btn btn-primary shadow-none">
                       Lihat Data Keuangan
                    </a>
                    <a href="{{ route('perkegiatan', $kegiatan->id) }}" class="-ml- btn btn-primary shadow-none">
                        Perhitungan
                     </a>
                    </td>
                    
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/rencanakegiatan/edit/{{ $kegiatan->id }}" class="mr-3"><i class="fa fa-16px fa-pen text-blue-500"></i></a> 
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
                {{-- @endif --}}
            @endforeach
        </x-slot>
    </x-data-table>
</div>

