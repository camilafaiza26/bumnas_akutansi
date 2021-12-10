<div>
    <x-data-table :data="$data" :model="$variables">
        <x-slot name="head">
            <h4 class="inline-block text-blue-500" >Total Biaya Variabel :  </h4> 
            <p class="inline-block bg-blue-200 ml-2 mb-2 px-2 py-1 rounded-md"> Rp{{ number_format($variables->sum('hargaV'),2,',','.')}} </p> 
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    No
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('namaV')" role="button" href="#">
                    Nama Biaya
                    @include('components.sort-icon', ['field' => 'namaV'])
                </a></th>
                <th><a wire:click.prevent="sortBy('hargaV')" role="button" href="#">
                    Jumlah Biaya
                    @include('components.sort-icon', ['field' => 'hargaV'])
                </a></th>
                <th><a wire:click.prevent="sortBy('ketV')" role="button" href="#">
                   Keterangan
                    @include('components.sort-icon', ['field' => 'ketV'])
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
            @foreach ($variables as $variable)
                {{-- @if($variable->user_id == Auth::user()->id) --}}
                <tr x-data="window.__controller.dataTableController({{ $variable->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $variable->namaV }}</td>
                    <td>Rp{{ number_format($variable->hargaV,2,',','.') }}</td>
                    @if ($variable->ketV == NULL)
                    <td class="text-center">-</td>
                    @else
                    <td>{{ $variable->ketV }}</td>
                    @endif
                    <td>{{ $variable->created_at->format('d M Y H:i') }}</td>
                    <td>{{ $variable->updated_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                         <a role="button" href="/variable/edit/{{ $variable->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a> 
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
                {{-- @endif --}}
            @endforeach
        </x-slot>
    </x-data-table>
</div>
