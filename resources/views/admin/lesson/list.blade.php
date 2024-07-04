<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ders Programı') }}
        </h2>
    </x-slot>


    <div class="container mt-5">
        <h1 style="font-size: 40px">Aldığı Dersler</h1>

        <div class="timetable-img text-center">
            <img src="img/content/timetable.png" alt="">
        </div>
        <div class="table-responsive">

            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-light-gray">
                        <th class="text-uppercase">Id</th>
                        <th class="text-uppercase">İsim</th>
                        <th class="text-uppercase">İşlemler</th>

                    </tr>
                </thead>
                <tbody>



                    @foreach ($lessons as $lesson)
                        <form method="POST" action="{{ route('notablelessons.create') }}">
                            @csrf
                            <input type="hidden" name="userid" value="{{ $user }}">

                            <input type="hidden" name="lessonid" value="{{ $lesson->id }}">

                            <tr>
                                <td class="align-middle">{{ $lesson->id }}</td>
                                <td class="align-middle">{{ $lesson->name }}</td>
                                <td class="align-middle" style="color: red;"><button type="submit">Dersi Sil</button>
                                </td>
                            </tr>
                        </form>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="container mt-5">
        <h1 style="font-size: 40px">Almadığı Dersler</h1>
        <div class="timetable-img text-center">
            <img src="img/content/timetable.png" alt="">
        </div>
        <div class="table-responsive">

            <table class="table table-bordered text-center">
                <thead>
                    <tr class="bg-light-gray">
                        <th class="text-uppercase">Id</th>
                        <th class="text-uppercase">İsim</th>
                        <th class="text-uppercase">İşlemler</th>
                    </tr>
                </thead>
                <tbody>



                    @foreach ($notabledlessons as $notabledlesson)
                        <form method="POST" action="{{ route('notablelessonsdestroy') }}">
                            @csrf
                            <input type="hidden" name="userid" value="{{ $notabledlesson->userid }}">

                            <input type="hidden" name="lessonid" value="{{ $notabledlesson->lessonid }}">

                            <tr>
                                <td class="align-middle">{{ $notabledlesson->id }}</td>
                                <td class="align-middle">{{ $notabledlesson->lessons_name }}</td>
                                <td class="align-middle" style="color: blue;"><button type="submit">Dersi Ver</button>
                                </td>
                            </tr>
                        </form>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
