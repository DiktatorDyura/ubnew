<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotableLessons extends Model
{
    use HasFactory;
    protected $table='notable_lessons';
    protected $fillable = [
        'userid',
        'lessonid',
    ];
}
