<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Biaya Semi Variabel') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data biaya semi varibel baru') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="namaS" value="{{ __('Nama Biaya') }}" />
                <x-jet-input id="namaS" type="text" class="mt-1 block w-full form-control shadow-none" placeholder="Masukkan nama biaya semi variabel" wire:model.defer="semi.namaS" />
                <x-jet-input-error for="semi.namaS" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="hargaS" value="{{ __('Jumlah Biaya') }}" />
                <x-jet-input id="hargaS" type="text" class="mt-1 block w-full form-control shadow-none"  placeholder="Masukkan biaya semi variabel"  wire:model.defer="semi.hargaS" />
                <x-jet-input-error for="semi.hargaS" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="ketS" value="{{ __('Keterangan') }}" />
                <textarea id="ketS" type="text" class="mt-1 block w-full form-control shadow-none" placeholder="Masukkan keterangan (jika ada)"  wire:model.defer="semi.ketS"></textarea>
                <x-jet-input-error for="semi.ketS" class="mt-2" />
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
    var rupiah = document.getElementById("hargaS")
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