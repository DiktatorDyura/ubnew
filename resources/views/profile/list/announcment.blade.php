<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Duyurular') }}
        </h2>
    </x-slot>




    <div class="container mx-auto p-6 grid grid-cols-1 gap-4">
        @foreach ($announcements as $announcement)
            <div class="col-span-1 flex flex-col bg-white border-2 p-2">
                <h2 class="mb-2 font-bold text-xl">
                    {{ $announcement->department_name }}<p style="float: right;">{{ $announcement->teacher_name }}</p>
                    <hr style="  border-width: 3px;">
                </h2>
                <div class="flex items-center  h-full">
                    <p style="font-size:1.5rem;" class="text-center">{{ $announcement->text }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
