<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ders Programı') }}
        </h2>
    </x-slot>


    <div class="container mt-5">
        <div class="timetable-img text-center">
            <img src="img/content/timetable.png" alt="">
        </div>
        <div class="table-responsive">

            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-light-gray">
                        <th class="text-uppercase">Id</th>
                        <th class="text-uppercase">İsim</th>
                        <th class="text-uppercase">Öğretmen</th>
                        <th class="text-uppercase">Gün</th>
                        <th class="text-uppercase">Saat</th>
                        <th class="text-uppercase">İşlemler</th>
                    </tr>
                </thead>
                <tbody>



                    @foreach ($lessons as $lesson)
                        <form method="POST" action="{{ route('admin.list.lesson') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $lesson->id }}">
                            <tr>
                                <td class="align-middle">{{ $lesson->id }}</td>
                                <td class="align-middle">{{ $lesson->name }}</td>
                                <td class="align-middle">{{ $lesson->teacher_name }}</td>
                                <td class="align-middle">{{ $lesson->weekday }}</td>
                                <td class="align-middle">{{ $lesson->time }}</td>

                                <td class="align-middle" style="color: red;"><button type="submit">SİL</button></td>
                            </tr>
                        </form>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
