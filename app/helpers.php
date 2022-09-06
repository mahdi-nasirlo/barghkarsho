<?php

use App\Models\Blog\Post;
use App\Models\MyPayment;
use App\Models\Order;
use App\Models\Shop\Course;

function activeClassProfile($name, $needClass = true)
{
    $return = $needClass ? " active show" : "true";

    if (request()->tab) {
        return (request()->tab === $name ? $return : '');
    }

    return ($name === "dashboard" ? $return : '');
}


function totalIncome()
{
    return  number_format(Order::all(["status", "price"])->where("status", "!=", "unpaid")->sum("price"));
}

function totalView()
{
    $article = Post::all(["view"])->sum("view");
    $course = Course::all(["view"])->sum("view");

    return $article + $course;
}
