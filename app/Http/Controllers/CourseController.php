<?php

namespace App\Http\Controllers;

use App\Models\Blog\Category;
use App\Models\Shop\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        if (!Carbon::parse($course->published_at)->isPast() && !$course->inventory > 0) {
            return abort(404);
        }

        $course->update(['view' => $course->view + 1]);

        return view("home.course.index", ['cours' => $course]);
    }
}
