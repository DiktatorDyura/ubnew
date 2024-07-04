<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ders Ekle') }}
        </h2>
    </x-slot>

    <x-guest-layout>
        <form method="POST" action="{{ route('admin.add.lesson') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <input type="hidden" name="teacher" value="{{ auth()->id() }}">

            <div class="mt-4">
                <x-input-label for="weekday" :value="__('Gün')" />
                <select
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                    name="weekday" id="weekday">
                    <option value="1">Pazartesi</option>
                    <option value="2">Salı</option>
                    <option value="3">Çarşamba</option>
                    <option value="4">Perşembe</option>
                    <option value="5">Cuma</option>
                </select>
            </div>


            <!-- time seçme -->
            <div class="mt-4">
                <x-input-label for="time" :value="__('time')" />
                <x-text-input id="time" class="block mt-1 w-full" name="time" type="time" :value="old('time')"
                    required autocomplete="time" />
                <x-input-error :messages="$errors->get('time')" class="mt-2" />
            </div>

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
