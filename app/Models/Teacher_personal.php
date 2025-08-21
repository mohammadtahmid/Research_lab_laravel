<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher_personal extends Model
{
    protected $table = 'teacher_personals';

    protected $fillable = [
        'image',
        'name',
        'designation',
        'university',
        'location',
        'call',
        'email',
        'biography',
        'facebook',
        'linkedin',
        'github',
    ];
}
