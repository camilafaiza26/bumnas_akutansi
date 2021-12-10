<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Biaya Variable') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data biaya variable baru') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="namaV" value="{{ __('Nama Biaya') }}" />
                <x-jet-input id="namaV" type="text" class="mt-1 block w-full form-control shadow-none" placeholder="Masukkan Nama Biaya" wire:model.defer="variable.namaV" />
                <x-jet-input-error for="variable.namaV" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="hargaV" value="{{ __('Jumlah Biaya') }}" />
                <x-jet-input id="hargaV" type="text" class="mt-1 block w-full form-control shadow-none"  placeholder="Masukkan Biaya"  wire:model.defer="variable.hargaV" />
                <x-jet-input-error for="variable.hargaV" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="ketV" value="{{ __('Keterangan') }}" />
                <textarea id="ketV" type="text" class="mt-1 block w-full form-control shadow-none" placeholder="Masukkan keterangan (jika ada)"  wire:model.defer="variable.ketV"></textarea>
                <x-jet-input-error for="variable.ketV" class="mt-2" />
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
{{-- 

<script>
    function sum() {
    var txtket = document.getElementById('ketV').value;
    var txtHarga = document.getElementById('hargaV').value;
    var result = txtket*txtHarga;
    if (!isNaN(result)) {
       document.getElementById('totalV').value = result;
    }

    
}
</script> --}}
<script>
    var rupiah = document.getElementById("hargaV")
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