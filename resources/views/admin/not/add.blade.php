<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ders Ekle') }}
        </h2>
    </x-slot>

    <x-guest-layout>
        <form method="POST" action="{{ route('not.add') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="not" :value="__('Not')" />
                <x-text-input id="not" class="block mt-1 w-full" type="text" name="not" :value="old('not')"
                    required autofocus autocomplete="not" />
                <x-input-error :messages="$errors->get('not')" class="mt-2" />
            </div>
           <input type="hidden" name="teacher_id" value="{{Auth::id()}}">
            <div class="mt-4">
                <x-input-label for="user_id" :value="__('Öğrenci')" />
                <select
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full"
                    name="user_id" id="user_id">
                    <option value="">öğrenci seçiniz</option>
                   @foreach (\app\models\User::where('role','student')->get() as $student)
                   <option value="{{$student->id}}">{{$student->name}}</option>
                   @endforeach
                    
                    
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
                    {{ __('Not Ekle') }}
                </x-primary-button>
            </div>
        </form>
    </x-guest-layout>

</x-app-layout>
