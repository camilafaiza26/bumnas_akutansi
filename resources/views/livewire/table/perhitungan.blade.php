<div>
    <x-data-table :data="$data" :model="$perhitungans">
        <x-slot name="head">
            <tr>
                <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    No
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Tgl Perhitungan
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>    
                <th><a wire:click.prevent="sortBy('pendapatan')" role="button" href="#">
                    Pendapatan
                    @include('components.sort-icon', ['field' => 'pendapatan'])
                </a></th>
                <th><a wire:click.prevent="sortBy('initial_outlay')" role="button" href="#">
                    Initial Outlay
                    @include('components.sort-icon', ['field' => 'initial_outlay'])
                </a></th>
                <th><a wire:click.prevent="sortBy('waktu')" role="button" href="#">
                   Waktu
                    @include('components.sort-icon', ['field' => 'waktu'])
                </a></th>
                <th><a wire:click.prevent="sortBy('bunga')" role="button" href="#">
                    Bunga
                     @include('components.sort-icon', ['field' => 'bunga'])
                 </a></th>
                 <th><a wire:click.prevent="sortBy('npv')" role="button" href="#">
                    NPV
                     @include('components.sort-icon', ['field' => 'npv'])
                 </a></th>
                 <th><a wire:click.prevent="sortBy('status')" role="button" href="#">
                    Status
                     @include('components.sort-icon', ['field' => 'status'])
                 </a></th>
                           
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($perhitungans as $perhitungan)
                <tr x-data="window.__controller.dataTableController({{ $perhitungan->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $perhitungan->created_at->format('d M Y H:i') }}</td>
                    <td>Rp{{ number_format($perhitungan->pendapatan,2,',','.') }}</td>
                    <td>Rp{{ number_format($perhitungan->initial_outlay,2,',','.') }}</td>
                    <td>{{ $perhitungan->waktu}} th</td>
                    <td>{{ $perhitungan->bunga}}%</td>
                    <td>Rp{{ number_format($perhitungan->npv,2,',','.') }}</td>
                    <td>{{ $perhitungan->status}}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/perhitungan/detail/{{ $perhitungan->id }}" class="mr-3"><i class="fa fa-16px fa-eye text-green-500" "></i></a> 
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
                {{-- @endif --}}
            @endforeach
        </x-slot>
    </x-data-table>
</div>
