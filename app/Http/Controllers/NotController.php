<?php

namespace App\Http\Controllers;

use App\Models\Not;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotController extends Controller
{
  public function index()
  {
      $nots = Not::leftJoin('users as teacher', 'not.teacher_id', '=', 'teacher.id')
      ->leftJoin('users', 'not.user_id', '=', 'users.id')
      ->leftJoin('lessons', 'not.lesson_id', '=', 'lessons.id')
      ->select(
          'not.*',
          'teacher.name as teacher_name',
          'users.name as user_name',
          'lessons.name as lesson_name'
      )
      ->get();
    
    return view('admin.not.list',compact('nots'));
  }

  public function store(Request $request)
  {
    $rules = [
      'teacher_id' => 'required|integer',
      'user_id' => 'required|integer',
      'lesson_id' => 'required|integer',
      'not' => 'required|integer',
      
  ];

  $validate = Validator::make($request->all(),$rules);
  if($validate->fails()){
      return redirect()->back()->withErrors($validate->errors())->withInput();
  }
    $not = new Not();
    $not->teacher_id = $request->teacher_id;
    $not->user_id = $request->user_id;
    $not->lesson_id = $request->lesson_id;
    $not->not = $request->not;
    if ($not->save()){
        return redirect('/not/list')->with(['success'=>'Not başarıyla kaydedildi.']);
    }
    return redirect()->back()->withErrors(['msg'=>'Bir sorun oluştu'])->withInput();
  }
}
