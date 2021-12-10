<div>
    <x-data-table :data="$data" :model="$tetaps">
        <x-slot name="head">
            <h4 class="inline-block text-blue-500" >Total Biaya Tetap :  </h4> 
            <p class="inline-block bg-blue-200 ml-2 mb-2 px-2 py-1 rounded-md"> Rp{{ number_format($tetaps->sum('hargaT'),2,',','.')}} </p> 
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    No
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('namaT')" role="button" href="#">
                    Nama Biaya
                    @include('components.sort-icon', ['field' => 'namaT'])
                </a></th>
                <th><a wire:click.prevent="sortBy('hargaT')" role="button" href="#">
                    Jumlah Biaya
                    @include('components.sort-icon', ['field' => 'hargaT'])
                </a></th>
                <th><a wire:click.prevent="sortBy('ketT')" role="button" href="#">
                   Keterangan
                    @include('components.sort-icon', ['field' => 'ketT'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Tanggal Dibuat
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th><a wire:click.prevent="sortBy('updated_at')" role="button" href="#">
                    Tanggal Diubah
                    @include('components.sort-icon', ['field' => 'updated_at'])
                </a></th>
                
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($tetaps as $tetap)
                <tr x-data="window.__controller.dataTableController({{ $tetap->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $tetap->namaT }}</td>
                    <td>Rp{{ number_format($tetap->hargaT,2,',','.') }}</td>
                    @if ($tetap->ketT == NULL)
                    <td class="text-center">-</td>
                    @else
                    <td>{{ $tetap->ketT }}</td>
                    @endif
                    <td>{{ $tetap->created_at->format('d M Y H:i') }}</td>
                    <td>{{ $tetap->updated_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                         <a role="button" href="/tetap/edit/{{ $tetap->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a> 
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
