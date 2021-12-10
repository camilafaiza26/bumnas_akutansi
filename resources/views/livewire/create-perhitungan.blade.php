<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Perhitungan') }}
        </x-slot>
        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk melakukan perhitungan, dan pastikan data variabel, data semi variabel dan  data tetap sudah benar') }}
        </x-slot>
        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="initial_outlay" value="{{ __('Perhitungan Initial Outlay ') }}" />
                @if (@isset($perhitungan->created_at))
                <p class="mt-1 mb-1">Tanggal Perhitungan : {{$perhitungan->created_at->format('d M Y H:i')}}</p>
                @endif
                <div class="flex" id="initial_outlay">
                    <span class="text-sm border border-1 rounded-l px-4 py-2 bg-white whitespace-no-wrap w-4/6 text-blue-600">Total Biaya Variabel </span>
                    <span class="text-sm border-t-2 border-b-2 border-gray-200 px-4 py-2 bg-white whitespace-no-wrap w-1/6">Rp</span>
                    <input class="border-t-2 border-b-2 border-r-2 border-gray-200  rounded-r px-4 py-2 w-full bg-white w-1/2 text-right w-1/6"  disabled type="text" wire:model.defer="perhitungan.total_variable"/>
                </div>
                <div class="flex">
                    <span class="text-sm border border-1 rounded-l px-4 py-2 bg-white whitespace-no-wrap w-4/6 text-blue-600" >Total Biaya Semi Variabel</span>
                    <span class="text-sm border-b-2 border-gray-200 px-4 py-2 bg-white whitespace-no-wrap w-1/6">Rp</span>
                    <input class="border-b-2 border-r-2 border-gray-200  rounded-r px-4 py-2 w-full bg-white w-1/2 text-right w-1/6" disabled type="text"  wire:model.defer="perhitungan.total_semi" />
                </div>
                <div class="flex">
                    <span class="text-sm border border-1 rounded-l px-4 py-2 bg-white whitespace-no-wrap w-4/6 text-blue-600">Total Biaya Tetap</span>
                    <span class="text-sm border-b-2 border-gray-200 px-4 py-2 bg-white whitespace-no-wrap w-1/6">Rp</span>
                    <input class="border-b-2 border-r-2 border-gray-200 rounded-r px-4 py-2 w-full bg-white w-1/6 text-right" disabled type="text"   wire:model.defer="perhitungan.total_tetap"  />
                </div>
 
                <div class="flex mt-1">
                <span class="text-sm border border-1 rounded-l px-4 py-2 bg-white whitespace-no-wrap w-4/6 text-blue-600 font-bold">Initial Outlay</span>
                <span class="text-sm border-b-2  border-t-2 border-gray-200 px-4 py-2 bg-white whitespace-no-wrap w-1/6 text-blue-600 font-bold">Rp</span>
                <input class="border-b-2 border-t-2 border-r-2 border-gray-200 rounded-r px-4 py-2 w-full bg-white w-1/6 text-right text-blue-600 font-bold"  disabled="true" type="text"  wire:model.defer="perhitungan.initial_outlay"/>
                 </div>
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="pendapatan" value="{{ __('Total Pendapatan') }}" />
                <x-jet-input id="pendapatan" type="text" class="mt-1 block w-full form-control shadow-none" placeholder="Masukkan Pendapatan" wire:model.defer="perhitungan.pendapatan" />
                <x-jet-input-error for="perhitungan.pendapatan" class="mt-2" />
            </div>
          
            <div class="form-group col-span-6 sm:col-span-5">
            <x-jet-label for="bunga" value="{{ __('Bunga') }}" />
                <select id="bunga" class="form-select block w-full mt-1" wire:model.defer="perhitungan.bunga_id">
                    <option hidden selected>--- Pilih Bunga ---</option>
                    @foreach ($bungas as $bunga)
                    <option value="{{$bunga->id_bunga}}" >
                       {{$bunga->bunga}}%
                    </option>
                    @endforeach
                </select>
                <x-jet-input-error for="perhitungan.bunga" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="waktu" value="{{ __('Waktu (Tahun)') }}" />
                <x-jet-input id="waktu" type="number" min="0" class="mt-1 block w-full form-control shadow-none"  placeholder="Masukkan Waktu"  wire:model.defer="perhitungan.waktu" />
                <x-jet-input-error for="perhitungan.waktu" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />
</div>

<script>
    var rupiah = document.getElementById("pendapatan")
    rupiah.addEventListener("keyup", function (e) {
        rupiah.value = formatRupiah(this.value);
    });

    function formatRupiah(angka) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return rupiah;
    }
</script>