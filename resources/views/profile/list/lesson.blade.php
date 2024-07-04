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
                        <th class="text-uppercase">Zaman</th>
                        <th class="text-uppercase">Pazartesi</th>
                        <th class="text-uppercase">Salı</th>
                        <th class="text-uppercase">Çarşamba</th>
                        <th class="text-uppercase">Perşembe</th>
                        <th class="text-uppercase">Cuma</th>
                    </tr>
                </thead>
                <tbody>



                    @foreach ($lessons as $lesson)
                        <tr>
                            <td class="align-middle">{{ $lesson[0]->time }}</td>

                            @php
                                $weekdays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
                            @endphp

                            @foreach ($weekdays as $index => $weekday)
                                <td>
                                    @foreach ($lesson as $item)
                                        @if ($item->weekday == $index + 1)
                                            {{ $item->name }}
                                        @endif
                                    @endforeach
                                </td>
                            @endforeach
                        </tr>
                    @endforeach





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
