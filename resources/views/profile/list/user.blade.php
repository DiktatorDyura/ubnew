<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Öğrenciler') }}
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
                        <th class="text-uppercase">Öğrenci Numarası</th>
                        <th class="text-uppercase">Bölüm</th>
                        <th class="text-uppercase">İşlemler</th>
                        <th class="text-uppercase">Öğrenci Dersleri</th>


                    </tr>
                </thead>
                <tbody>



                    @foreach ($users as $user)
                        <form method="POST" action="{{ route('profile.deleteuser') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <tr>
                                <td class="align-middle">{{ $user->id }}</td>
                                <td class="align-middle">{{ $user->name }}</td>
                                <td class="align-middle">{{ $user->studentNumber }}</td>
                                <td class="align-middle">{{ $user->department_name }}</td>
                                <td class="align-middle" style="color: red;"><button type="submit">SİL</button></td>
                        </form>
                    @endforeach
                    <form action="{{ route('notablelessons') }}" method="GET">
                        @foreach ($users as $user)
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <td class="align-middle" style="color: blue;"><button type="submit">Görüntele</button></td>
                        @endforeach
                        </tr>
                    </form>




                    {{-- 
                    <tr>
                        <td class="align-middle">09:00-09:45</td>
                        <td>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        <td>
                            <div class="font-size13 text-light-gray">Marta Healy</div>
                        </td>

                        <td>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        <td>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        <td>
                            <div class="font-size13 text-light-gray">Kate Alley</div>
                        </td>



                    </tr>

                    <tr>
                        <td class="align-middle">10:00-10:45</td>
                        <td>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td>
                            <div class="font-size13 text-light-gray">Kate Alley</div>
                        </td>
                        <td>
                            <div class="font-size13 text-light-gray">Marta Healy</div>
                        </td>
                        <td>
                            <div class="font-size13 text-light-gray">James Smith</div>
                        </td>

                    </tr>

                    <tr>
                        <td class="align-middle">11:00-11:45</td>
                        <td>
                            <div class="font-size13 text-light-gray">James Smith</div>

                        </td>
                        <td>
                            <div class="font-size13 text-light-gray">James Smith</div>

                        </td>
                        <td>
                            <div class="font-size13 text-light-gray">James Smith</div>

                        </td>
                        <td>
                            <div class="font-size13 text-light-gray">James Smith</div>

                        </td>
                        <td>
                            <div class="font-size13 text-light-gray">James Smith</div>

                        </td>

                    </tr>

                    <tr>
                        <td class="align-middle">12:00-13:00 </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td class="bg-light-gray">

                        </td>


                    </tr>

                    <tr>
                        <td class="align-middle">13:00-13:45</td>
                        <td class="bg-light-gray">

                        </td>
                        <td>
                            <div class="font-size13 text-light-gray">Kate Alley</div>
                        </td>
                        <td>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        <td>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        <td class="bg-light-gray">

                        </td>

                    </tr>

                    <tr>
                        <td class="align-middle">14:00-14:35</td>
                        <td>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray">James Smith</div>
                        </td>
                        <td>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray">Ivana Wong</div>
                        </td>
                        <td class="bg-light-gray">

                        </td>
                        <td>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray">James Smith</div>
                        </td>
                        <td>
                            <div class="margin-10px-top font-size14">1:00-2:00</div>
                            <div class="font-size13 text-light-gray">Marta Healy</div>
                        </td>

                    </tr> --}}
                </tbody>
            </table>
        </div>
    </div>


</x-app-layout>
