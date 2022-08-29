<?php

namespace App\Http\Controllers;

use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Http\Request;

class articleController extends Controller
{
    public function show(Post $post)
    {

        if (!$post->published_at->isPast()) abort(404);

        $post->update(['view' => $post->view + 1]);

        return view('home.blog-detail.index', ['article' => $post]);
    }

    public function list(Category $category)
    {
        if (!$category->isVIsible() or !$category->is_visible) abort(404);

        $category_sub_cat_ids = [$category->id];
        $category->getChildrenIds($category_sub_cat_ids);

        $post = Post::query()->whereIn('blog_category_id', $category_sub_cat_ids)->Where('published_at', "<", now())->paginate(10);

        return view('home.blog-list.index', ['category' => $category, 'posts' => $post]);
    }


    public function storComment(Request $request)
    {
        $data = $request->validate([
            'content' => ['required'],
            'commentable_id' => ['required'],
            'commentable_type' => ['required', 'string'],
            'parent_id' => ['required', 'string']
        ]);

        auth()->user()->comments()->create($data);

        Alert::success('دیدگاه شما با موفقیت ثبت شد');

        return back();
    }
}
