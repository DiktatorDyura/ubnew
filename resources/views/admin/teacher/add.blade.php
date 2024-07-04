<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ders Ekle') }}
        </h2>
    </x-slot>

    <x-guest-layout>
        <form method="POST" action="{{ route('') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Ad')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
           <div>
                <x-input-label for="surname" :value="__('Soyad')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')"
                    required autofocus autocomplete="surname" />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="department_id" :value="__('Departman')" />
                <select
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                    name="department_id" id="department_id">
                    <option value="1">Bilgisayar Programciligi</option>
                    <option value="2">Grafik Tasarim</option>
                    <option value="3">Elektronik ve Otomasyon</option>
                    
                    
                </select>
            </div>
            <div class="mt-4">
                <x-input-label for="lesson_id" :value="__('Ders')" />
                <select
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                    name="lesson_id" id="lesson_id">
                    <option value="1">Bilgisayar Programciligi</option>
                    <option value="2">Grafik Tasarim</option>
                    <option value="3">Elektronik ve Otomasyon</option>
                    
                    
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ms-4">
                    {{ __('Öğretmen Ekle') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>

</x-app-layout>
