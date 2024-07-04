<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table = 'teacher';
    protected $fillable = [
        'name',
        'surname',
        'department_id',
        'lesson_id',
    ];

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }

}
