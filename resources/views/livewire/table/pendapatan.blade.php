<div>
    <x-data-table :data="$data" :model="$pendapatans">
        <x-slot name="head">
            <h4 class="inline-block text-blue-500" >Total Pendapatan :   </h4> 
            <p class="inline-block bg-blue-200 ml-2 mb-2 px-2 py-1 rounded-md"> Rp{{ number_format($pendapatans->sum('jumlah_pendapatan'),2,',','.')}} </p> 
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    No
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('tahun_ke')" role="button" href="#">
                    Tahun-Ke
                    @include('components.sort-icon', ['field' => 'tahun_ke'])
                </a></th>
                <th><a wire:click.prevent="sortBy('pendapatan')" role="button" href="#">
                    Pendapatan
                    @include('components.sort-icon', ['field' => 'pendapatan'])
                </a></th>    
                <th><a wire:click.prevent="sortBy('bunga')" role="button" href="#">
                    Bunga
                    @include('components.sort-icon', ['field' => 'bunga'])
                </a></th>    
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($pendapatans as $pendapatan)
                <tr x-data="window.__controller.dataTableController({{ $pendapatan->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>Tahun Ke- {{ $pendapatan->tahun_ke}}</td>
                    <td>Rp{{ number_format($pendapatan->jumlah_pendapatan,2,',','.') }}</td>
                    <td>{{ $pendapatan->bunga}}%</td>
                    {{-- <td>{{ $pendapatan->created_at->format('d M Y H:i') }}</td> --}}
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/rencanakegiatan/{{$kegiatanId}}/pendapatan/edit/{{ $pendapatan->id }}" class="mr-3"><i class="fa fa-16px fa-pen text-blue-500"></i></a> 
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
