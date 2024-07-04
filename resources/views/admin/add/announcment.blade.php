<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Duyuru Ekle') }}
        </h2>
    </x-slot>

    <x-guest-layout>
        <form method="POST" action="{{ route('admin.add.anouncment') }}">
            @csrf

            <div>
                <x-input-label for="text" :value="__('Text')" />
                <x-text-input id="text" class="block mt-1 w-full" type="text" name="text" :value="old('text')"
                    required autofocus />
                <x-input-error :messages="$errors->get('text')" class="mt-2" />
            </div>

            <input type="hidden" name="teacher" value="{{ auth()->id() }}">


            <!-- Bölüm seçme -->
            <div class="mt-4">
                <x-input-label for="department" :value="__('Bölüm')" />
                <select
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                    name="department" id="department">
                    <option value="1">Bilgisayar Programciligi</option>
                    <option value="2">Grafik Tasarim</option>
                    <option value="3">Elektronik ve Otomasyon</option>
                </select>
            </div>



            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Ders Ekle') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>

</x-app-layout>
