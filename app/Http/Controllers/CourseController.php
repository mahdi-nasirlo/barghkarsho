<?php

namespace App\Http\Controllers;

use App\Models\Blog\Category;
use App\Models\Shop\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        // $arr = [];

        // foreach (Category::all() as $key => $value) {
        //     $arr[$value->name] = ($value->childIsVisible());
        // }
        // dd($arr);


        $course->update(['view' => $course->view + 1]);

        return view("home.course.index", ['cours' => $course]);
    }
}
