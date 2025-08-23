<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $fillable = [
        'title',
        'authors',
        'abstract',
        'keywords',
        'paper_year',
        'paper_date',
        'journal',
        'doi',
        'paper_file',
    ];
}
