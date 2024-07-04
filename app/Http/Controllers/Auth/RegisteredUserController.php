<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('profile.adduser');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
            'department' => ['required', 'string'],
            'role' => ['required', 'string'],
            'studentNumber' => ['required', 'string', 'lowercase', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'name' => $request->name,
            'department' => $request->department,
            'email' => $request->email,
            'role' => $request->role,
            'studentNumber' => $request->studentNumber,
            'password' => Hash::make($request->password),
        ]);
       
        //event(new Registered($user));


        return redirect(route('profile.listuser', absolute: false));
    }

    public function show(): View
    {

        $users = User::select('users.*', 'departments.name as department_name')
            ->join('departments', 'users.department', '=', 'departments.id')
            ->orderBy('created_at', 'asc')
            ->where('role', 'student')
            ->get();


        return view('profile.list.user', compact('users'));
    }

    public function delete(Request $request): RedirectResponse
    {

        $request->validate([
            'id' => ['required', 'string'],
        ]);

        User::where('id', $request->id)->delete();


        return redirect(route('profile.listuser', absolute: false));
    }
}
