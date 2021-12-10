<div>
    <x-data-table :data="$data" :model="$perkegiatans">
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
                   Total Biaya Variable
                    @include('components.sort-icon', ['field' => 'initial_outlay'])
                </a></th>
                <th><a wire:click.prevent="sortBy('initial_outlay')" role="button" href="#">
                    Total Biaya Semi Variable
                    @include('components.sort-icon', ['field' => 'initial_outlay'])
                </a></th>
                <th><a wire:click.prevent="sortBy('initial_outlay')" role="button" href="#">
                    Total Biaya Tetap
                    @include('components.sort-icon', ['field' => 'initial_outlay'])
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
                 </a>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($perkegiatans as $perkegiatan)
                <tr x-data="window.__controller.dataTableController({{ $perkegiatan->id }})">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $perkegiatan->created_at->format('d M Y H:i') }}</td>
                    <td>Rp{{ number_format($perkegiatan->total_pendapatan,2,',','.') }}</td>
                    <td>Rp{{ number_format($perkegiatan->total_variable,2,',','.') }}</td>
                    <td>Rp{{ number_format($perkegiatan->total_semi,2,',','.') }}</td>
                    <td>Rp{{ number_format($perkegiatan->total_tetap,2,',','.') }}</td>
                    <td>Rp{{ number_format($perkegiatan->initial_outlay,2,',','.') }}</td>
                    <td>{{ $perkegiatan->waktu}} th</td>
                    <td>{{ $perkegiatan->bunga}}%</td>
                    <td>Rp{{ number_format($perkegiatan->npv,2,',','.') }}</td>
                    <td>{{ $perkegiatan->status}}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                    </td>
                </tr>
                {{-- @endif --}}
            @endforeach
        </x-slot>
    </x-data-table>
</div>
