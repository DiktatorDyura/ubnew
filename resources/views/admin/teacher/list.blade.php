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
                        <th class="text-uppercase">soyisim</th>
                        <th class="text-uppercase">departman</th>
                        <th class="text-uppercase">ders</th>
                        <th class="text-uppercase"></th>
                    </tr>
                </thead>
                <tbody>



                    @foreach ($teachers as $teacher)
                        <form method="POST" action="">
                            @csrf
                            <input type="hidden" name="userid" value="{{ Auth::id() }}">

                            <input type="hidden" name="lessonid" value="{{ $teacher->id }}">

                            <tr>
                                <td class="align-middle">{{ $teacher->id }}</td>
                                <td class="align-middle">{{ $teacher->name }}</td>
                                <td class="align-middle">{{ $teacher->surname }}</td>
                                <td class="align-middle">{{ $teacher->department ? $teacher->department->name : "" }}</td>
                                <td class="align-middle">{{ $teacher->lesson ? $teacher->lesson->name :""}}</td>
                                <td class="align-middle" style="color: red;"><button type="submit">Dersi Sil</button>
                                </td>
                            </tr>
                        </form>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
