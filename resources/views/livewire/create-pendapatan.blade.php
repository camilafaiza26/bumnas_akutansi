<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Tetapkan Pendapatan') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Lengkapi data berikut dan submit untuk membuat data pendapatan sesuai tahun kegiatan yang anda inputkan') }}
        </x-slot>

         <x-slot name="form">

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="tahun_ke" value="{{ __('Masukkan Bunga') }}" />
                <select id="bunga" class="form-select block w-full mt-1" wire:model.defer="pendapatan.bunga_id" required>
                <option hidden selected>--- Pilih Bunga ---</option>
                @foreach ($bungas as $bunga)
                <option value="{{$bunga->id_bunga}}" >
                   {{$bunga->bunga}}%
                </option>
                @endforeach
            </select>
            </div>
            {{$this->waktu}}

            @php
             $waktusArray = range(1, $waktu);   
            @endphp
                @foreach($waktusArray as $key => $value)
                <div class=" form-group flex flex-wrap col-span-6 sm:col-span-5 ma-0 mb-0" >
                    <div class=" form-group  w-full md:w-1/4 ">
                        <x-jet-label for="tahun_ke" value="{{ __('Tahun Ke') }}" />
                        <x-jet-input id="tahun_ke" type="number" min="1" class="mt-1 block w-full form-control shadow-none"  placeholder="Masukkan Tahun Ke" wire:model="pendapatan.tahun_ke.{{$value}}" required />
                        <x-jet-input-error for="pendapatan.tahun_ke.{{$value}}" class="mt-2" />
                    </div>
    
                    <div class="form-group  md:w-3/4 px-3 ">
                        <x-jet-label for="pendapatan" value="{{ __('Pendapatan') }}" />
                        <x-jet-input id="pendapatan" type="text" class="mt-1 block w-full form-control shadow-none" placeholder="Masukkan Pendapatan"   wire:model="pendapatan.jumlah_pendapatan.{{$value}}" required />
                        <x-jet-input-error for="pendapatan.jumlah_pendapatan.{{$value}}" class="mt-2" />
                    </div>
                </div>
           @endforeach            
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
