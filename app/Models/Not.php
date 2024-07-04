<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Not extends Model
{
    use HasFactory;
    protected $table = 'not';
    protected $fillable = [
        'teacher_id',
        'user_id',
        'lesson_id',
        'not',
    ];
    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }

}
