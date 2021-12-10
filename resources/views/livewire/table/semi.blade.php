<div>
    <x-data-table :data="$data" :model="$semis">
        <x-slot name="head">
            <h4 class="inline-block text-blue-500" >Total Biaya Semi :  </h4> 
            <p class="inline-block bg-blue-200 ml-2 mb-2 px-2 py-1 rounded-md"> Rp{{ number_format($semis->sum('hargaS'),2,',','.')}} </p> 
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    No
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('namaS')" role="button" href="#">
                    Nama Biaya
                    @include('components.sort-icon', ['field' => 'namaS'])
                </a></th>
                <th><a wire:click.prevent="sortBy('hargaS')" role="button" href="#">
                    Jumlah Biaya
                    @include('components.sort-icon', ['field' => 'hargaS'])
                </a></th>
                <th><a wire:click.prevent="sortBy('ketS')" role="button" href="#">
                   Keterangan
                    @include('components.sort-icon', ['field' => 'ketS'])
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
            @foreach ($semis as $semi)
                <tr x-data="window.__controller.dataTableController({{ $semi->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $semi->namaS }}</td>
                    <td>Rp{{ number_format($semi->hargaS,2,',','.') }}</td>
                    @if ($semi->ketS == NULL)
                    <td class="text-center">-</td>
                    @else
                    <td>{{ $semi->ketS }}</td>
                    @endif
                    <td>{{ $semi->created_at->format('d M Y H:i') }}</td>
                    <td>{{ $semi->updated_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                         <a role="button" href="/semi/edit/{{ $semi->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a> 
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
