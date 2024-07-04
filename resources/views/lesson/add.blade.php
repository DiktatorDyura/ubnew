<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Öğrenci Ekle') }}
        </h2>
    </x-slot>

    <x-guest-layout>
        <form method="POST" action="{{ route('profile.adduser') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- studendt number     -->
            <div class="mt-4">
                <x-input-label for="studentNumber" :value="__('Student Number')" />
                <x-text-input id="studentNumber" class="block mt-1 w-full" type="number" name="studentNumber"
                    :value="old('studentNumber')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('studentNumber')" class="mt-2" />
            </div>

            <!-- email seçme -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" name="email" type="email" :value="old('email')"
                    required autocomplete="email" />
                <x-input-error :messages="$errors->get('studentNumber')" class="mt-2" />
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

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">


                <x-primary-button class="ms-4">
                    {{ __('Öğrenci Ekle') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>

</x-app-layout>
