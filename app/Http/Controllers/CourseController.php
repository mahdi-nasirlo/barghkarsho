<?php

namespace App\Http\Controllers;

use App\Models\Blog\Category;
use App\Models\Shop\Course;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CourseController extends Controller
{
    public function show(Course $course)
    {
        if (!Carbon::parse($course->published_at)->isPast() && !$course->inventory > 0) {
            return abort(404);
        }

        SEOMeta::setTitle($course->seo->title ?? $course->title)
            ->setDescription($course->seo->description)
            ->addMeta("article:published_time", $course->created_at)
            ->addMeta("revised", $course->updated_at)
            ->addMeta("author",  $course->seo->author ??  $course->user->name . " ," . $course->user->email)
            ->addMeta("designer", env("DESIGNER"))
            ->addMeta("owner", $course->user->name);

        OpenGraph::setDescription($course->seo->description);
        OpenGraph::setTitle($course->seo->title ?? $course->title);

        OpenGraph::addImage(asset("/storage/" . $course->image));

        $course->update(['view' => $course->view + 1]);

        return view("home.course.index", ['cours' => $course]);
    }
}
