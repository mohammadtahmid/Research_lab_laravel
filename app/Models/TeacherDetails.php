<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherDetails extends Model
{
    protected $fillable = [
        'image',
        'edu_year', 'edu_degree', 'edu_university', 'edu_location',
        'pro_start', 'pro_end', 'pro_designation', 'pro_organization', 'pro_location',
        'award_year', 'award_org', 'award_location', 'award_responsibility'
    ];
}
