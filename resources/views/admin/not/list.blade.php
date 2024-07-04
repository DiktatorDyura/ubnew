<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ders Programı') }}
        </h2>
    </x-slot>


    <div class="container mt-5">
        <h1 style="font-size: 40px">Notlar</h1>

        <div class="timetable-img text-center">
            <img src="img/content/timetable.png" alt="">
        </div>
        <div class="table-responsive">

            <table class="table table-bordered text-center">
                <thead>
                <tr class="bg-light-gray">
                        <th class="text-uppercase">Id</th>
                        <th class="text-uppercase">Öğretmen</th>
                        <th class="text-uppercase">Öğrenci</th>
                        <th class="text-uppercase">ders</th>
                        <th class="text-uppercase">Not</th>
                    </tr>
                </thead>
                <tbody>



                    @foreach ($nots as $not)
                        <form method="POST" action="">
                            @csrf
                            <input type="hidden" name="userid" value="{{ Auth::id() }}">

                            <input type="hidden" name="lessonid" value="{{ $not->id }}">

                            <tr>
                                <td class="align-middle">{{ $not->id }}</td>
                                <td class="align-middle">{{ $not->teacher_name }}</td>
                                <td class="align-middle">{{ $not->user_name }}</td>
                                <td class="align-middle">{{ $not->lesson_name}}</td>
                                <td class="align-middle">{{ $not->not}}</button>
                                </td>
                            </tr>
                        </form>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
