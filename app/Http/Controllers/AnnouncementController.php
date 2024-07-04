<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;


class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //duyuru ana sayfası
    public function index()
    {
        //bölüm alınır
        $department = Auth::user()->department;

        //kullanıcının rolü alınır
        $role = Auth::user()->role;

        //eğer kullanıcı admin ise tüm duyuruları getir
        if ($role == 'admin') {
            $announcements = Announcement::select('announcements.*', 'departments.name as department_name', 'users.name as teacher_name')
                ->join('departments', 'announcements.department', '=', 'departments.id')
                ->join('users', 'announcements.teacher', '=', 'users.id')
                ->orderBy('created_at', 'asc')
                ->get();

            //duyuruları listeleme sayfasına yönlendir
            return view('profile.list.announcment', compact('announcements'));
        }

        // eğer kullanıcı öğretmen ise kendi bölümündeki duyuruları getir
        $announcements = Announcement::select('announcements.*', 'departments.name as department_name', 'users.name as teacher_name')
            ->join('departments', 'announcements.department', '=', 'departments.id')
            ->join('users', 'announcements.teacher', '=', 'users.id')
            ->orderBy('created_at', 'asc')
            ->where('departments.id', $department)
            ->get();

        //duyuruları listeleme sayfasına yönlendir
        return view('profile.list.announcment', compact('announcements'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'text' => ['required', 'string', 'max:255'],
            'department' => ['required', 'string'],
            'teacher' => ['required', 'string'],
        ]);

        $announcement = Announcement::create([
            'text' => $request->text,
            'department' => $request->department,
            'teacher' => $request->teacher,
        ]);




        return redirect(route('profile.announcment', absolute: false));
    }


}
