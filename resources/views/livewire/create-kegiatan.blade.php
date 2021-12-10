<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Rencana Kegiatan') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data rencana kegiatan baru') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="namaS" value="{{ __('Nama Kegiatan') }}" />
                <x-jet-input id="namaS" type="text" class="mt-1 block w-full form-control shadow-none" placeholder="Masukkan nama kegiatan" wire:model.defer="kegiatan.nama_kegiatan" />
                <x-jet-input-error for="kegiatan.nama_kegiatan" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="waktu_kegiatan" value="{{ __('Waktu Kegiatan') }}" />
                <x-jet-input id="waktu_kegiatan" type="number" min="1" class="mt-1 block w-full form-control shadow-none"  placeholder="Masukkan waktu kegiatan "  wire:model.defer="kegiatan.waktu_kegiatan" />
                <x-jet-input-error for="kegiatan.waktu_kegiatan" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="bidang_id" value="{{ __('Bidang Kegiatan') }}" />
                <select id="bidang_id" class="form-select block w-full mt-1" wire:model.defer="kegiatan.bidang_id">
                    <option hidden selected>--- Pilih Bidang Usaha ---</option>
                    @foreach ($bidangs as $bidang)
                    <option value="{{$bidang->id_bidang}}" >
                       {{$bidang->nama_bidang}}
                    </option>
                    @endforeach
                </select>
                <x-jet-input-error for="kegiatan.bidang_id" class="mt-2" />
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
