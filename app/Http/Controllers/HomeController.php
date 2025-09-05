<?php

namespace App\Http\Controllers;


use App\Models\Logo;
use App\Models\Slider;
use App\Models\Article;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\TeacherDetails;
use App\Models\Teacher_personal;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function home(){
        $logo = Logo::latest()->first();
        $teacher_personal = Teacher_personal::latest()->first();
        $teacherDetails = TeacherDetails::all();
        $sliders = Slider::all();
        $students = Student::inRandomOrder()->take(3)->get();
        $articles = Article::inRandomOrder()->take(3)->get();

        return view('home.index', compact(
            'logo',
            'sliders',
            'teacher_personal',
            'teacherDetails',
            'students',
            'articles'
        ));
    }

    //student our team show
    public function our_team(){
        $teacher_personal = Teacher_personal::first();
        $students = Student::all();
        return view('home.our_team',compact('teacher_personal','students'));
    }


    //Home article page show
    public function article(){
        $articles_page = Article::orderBy('paper_year', 'desc')->get()->groupBy('paper_year');
        return view('home.article', compact('articles_page'));
    }
}
