<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
  public function index()
  {
    
    $teachers = Teacher::leftJoin('departments', 'teacher.department_id', '=', 'departments.id')
    ->leftJoin('lessons', 'teacher.lesson_id', '=', 'lessons.id')
    ->select(
    'teacher.*',
    'departments.name as department_name',
    'lessons.name as lesson_name'
    )->get();

    return  view('admin.teacher.list',compact('teachers'));

   
  }

  public function store(Request $request)
  {
    $rules = [
      'name' => 'required|string|max:255',
      'surname' => 'required|string',
      'department_id' => 'required|integer',
      'lesson_id' =>'required|integer',
      
  ];

  $validate = Validator::make($request->all(),$rules);
  if($validate->fails()){
      return redirect()->back()->withErrors($validate->errors())->withInput();
  }
    $teacher = new Teacher();
    $teacher->name = $request->name;
    $teacher->surname = $request->surname;
    $teacher->department_id = $request->department_id;
    $teacher->lesson_id = $request->lesson_id;
    if ($teacher->save()){
        return redirect()->route('teacher.list')->with(['success'=>'öğretmen başarıyla oluşturuldu.']);
    }
    return redirect()->back()->withErrors(['msg'=>'Bir sorun oluştu'])->withInput();
  }
}
