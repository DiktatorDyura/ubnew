<x-app-layout>


    <a href="{{ route('profile.announcment') }}">
        <div class="container mx-auto p-6 grid grid-cols-2 gap-4">
            <div class="col-span-1 flex flex-col bg-white border-2 p-4">
                <h2 class="mb-2 font-bold text-xl">
                    Öğrenci İşlemleri
                </h2>
                <div class="flex items-center justify-center h-full">
                    <p style="font-size:3rem;" class="text-center">Duyurular</p>
                </div>
            </div>
    </a>
    @auth
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'teacher')
            <a href="{{ route('admin.add.announcment') }}">
                <div class="col-span-1 flex flex-col bg-white border-2 p-4">
                    <h2 class="mb-2 font-bold text-xl">
                        Akademisyen İşlemleri
                    </h2>
                    <div class="flex items
                        -center justify-center h-full">
                        <p style="font-size:3rem;" class="text-center">Duyuru ekle</p>
                    </div>
                </div>
            </a>
        @endif
    @endauth
    <a href="{{ route('profile.calendar') }}">
        <div class="col-span-1 flex flex-col bg-white border-2 p-4">
            <h2 class="mb-2 font-bold text-xl">
                Öğrenci İşlemleri
            </h2>
            <div class="flex items-center justify-center h-full">
                <p style="font-size:3rem;" class="text-center">Ders Programı</p>
            </div>
        </div>
    </a>

    @auth
        @if (Auth::user()->role == 'admin' || Auth::user()->role == 'teacher')
            <a href="{{ route('admin.add.lesson') }}">
                <div class="col-span-1 flex flex-col bg-white border-2 p-4">
                    <h2 class="mb-2 font-bold text-xl">
                        Akademisyen İşlemleri
                    </h2>
                    <div class="flex items-center justify-center h-full">
                        <p style="font-size:3rem;" class="text-center">Ders ekle</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('admin.list.lesson') }}">
                <div class="col-span-1 flex flex-col bg-white border-2 p-4">
                    <h2 class="mb-2 font-bold text-xl">
                        Akademisyen İşlemleri
                    </h2>
                    <div class="flex items-center justify-center h-full">
                        <p style="font-size:3rem;" class="text-center">Ders sil</p>
                    </div>
                </div>
            </a>
            
            <a href="{{ route('admin.not.add') }}">
                <div class="col-span-1 flex flex-col bg-white border-2 p-4">
                    <h2 class="mb-2 font-bold text-xl">
                        Akademisyen İşlemleri
                    </h2>
                    <div class="flex items-center justify-center h-full">
                        <p style="font-size:3rem;" class="text-center">Not Ekle</p>
                    </div>
                </div>
            </a>
            
        @endif
        

    @endauth

    @auth
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('profile.adduser') }}">
                <div class="col-span-1 flex flex-col bg-white border-2 p-4">
                    <h2 class="mb-2 font-bold text-xl">
                        Admin İşlemleri
                    </h2>
                    <div class="flex items-center justify-center h-full">
                        <p style="font-size:3rem;" class="text-center">Öğrenci ekle</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('profile.listuser') }}">
                <div class="col-span-1 flex flex-col bg-white border-2 p-4">
                    <h2 class="mb-2 font-bold text-xl">
                        Admin İşlemleri
                    </h2>
                    <div class="flex items-center justify-center h-full">
                        <p style="font-size:3rem;" class="text-center">Öğrenci sil</p>
                    </div>
                </div>
            </a>
        @endif

    @endauth

    </div>


</x-app-layout>
