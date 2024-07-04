<?php

namespace App\Http\Controllers;

use App\Models\NotableLessons;
use App\Models\Lesson;

use Illuminate\Http\Request;

class NotableLessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //validasyon
        $validatedData = $request->validate([
            'id' => 'required|max:255',
        ]);

        //validasyon sonucu alınan kullanıcı id
        $user = $validatedData['id'];


        //kullanıcının almadığı dersler getirilir
        $notablelessonuser = NotableLessons::where('userid', $user)->get();

        //kullanıcının almadığı dersler bütün derslerden çıkarılır
        $notabledlessons = NotableLessons::select('notable_lessons.*', 'lessons.name as lessons_name')
            ->join('lessons', 'notable_lessons.lessonid', '=', 'lessons.id')
            ->orderBy('created_at', 'asc')
            ->get();


        //kullanıcının dersleri alınır
        $lessons = Lesson::whereNotIn('id', $notablelessonuser->pluck('lessonid'))->get();


        //ders programı listeleme sayfasına yönlendir
        return view('admin.lesson.list', compact('lessons', 'user', 'notabledlessons'));

    }

    public function store(Request $request)
    {
        // Validasyon kuralları
        $validatedData = $request->validate([
            'userid' => 'required|max:255',
            'lessonid' => 'required',
        ]);


        // Yeni ders oluşturma
        NotableLessons::create($validatedData);

        // ana sayfaya yönlendirme
        return redirect('/notablelessons')->with('success', 'Ders başarıyla eklendi!');
    }

    public function destroy(Request $request)
    {
        // Validasyon kuralları
        $validatedData = $request->validate([
            'userid' => 'required|max:255',
            'lessonid' => 'required',
        ]);

        // Ders silme
        NotableLessons::where('userid', $validatedData['userid'])
            ->where('lessonid', $validatedData['lessonid'])
            ->delete();

        // ana sayfaya yönlendirme
        return redirect('/notablelessons')->with('success', 'Ders başarıyla silindi!');
    }
}
