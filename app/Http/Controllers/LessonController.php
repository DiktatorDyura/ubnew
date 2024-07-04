<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\NotableLessons;
use App\Models\User;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //ders programı ana sayfası
    public function index()
    {

        //kullanıcının bölümü alınır
        $department = Auth::user()->department;
       

        //kullanıcının almadığı dersler getirilir
        $notablelessonuser = NotableLessons::where('userid', Auth::user()->id)->get();

        //kullanıcının almadığı dersler çıkarılır
        $lessons = Lesson::where(
            'department',
            $department
        )->orderBy('weekday', 'asc')->whereNotIn('id', $notablelessonuser->pluck('lessonid'))->get()
            ->sortBy('time')
            ->groupBy('time');





        // ders programı listeleme sayfasına yönlendir
        return view('profile.list.lesson', compact('lessons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        // Validasyon kuralları
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string'],
            'teacher' => ['required', 'string'],
            'time' => ['required', 'string'],
            'weekday' => ['required', 'string'],
        ]);

        // Yeni ders oluşturma
        $user = Lesson::create([
            'name' => $request->name,
            'teacher' => $request->teacher,
            'time' => $request->time,
            'weekday' => $request->weekday,
            'department' => $request->department,
        ]);


        //ders programı listeleme sayfasına yönlendir
        return redirect(route('admin.list.lesson', absolute: false));
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

        //tüm dersler getirilir
       
        $lessons = Lesson::join('departments', 'lessons.department', '=', 'departments.id')
            ->join('users', 'lessons.teacher', '=', 'users.id')
            ->select('lessons.*', 'departments.name as department_name', 'users.name as teacher_name')
            ->orderBy('created_at', 'asc')
            ->get();


        //ders programı listeleme sayfasına yönlendir
        return view('admin.list.lesson', compact('lessons'));
    }



    public function delete(Request $request): RedirectResponse
    {
        // Validasyon kuralları
        $request->validate([
            'id' => ['required', 'string'],
        ]);

        // Ders silme
        Lesson::where('id', $request->id)->delete();


        //ders programı listeleme sayfasına yönlendir
        return redirect(route('admin.list.lesson', absolute: false));
    }

}
