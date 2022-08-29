<?php

namespace App\Http\Controllers;

use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Comment;
use App\Models\Setting;
use App\Models\Tag;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;

class articleController extends Controller
{
    public function show(Post $post)
    {
        if (!$post->published_at->isPast()) abort(404);

        SEOMeta::setTitle($post->seo->title ?? $post->title)
            ->addMeta("article:published_time", $post->created_at)
            ->addMeta("revised", $post->updated_at)
            ->addMeta("author",  $post->seo->author ??  $post->user->name . " ," . $post->user->email)
            ->addMeta("designer", env("DESIGNER"))
            ->addMeta("owner", $post->user->name)
            ->addMeta("category", $post->category->name);

        $post->update(['view' => $post->view + 1]);

        return view('home.blog-detail.index', ['article' => $post]);
    }

    public function list(Category $category)
    {

        if (!$category->isVIsible() or !$category->is_visible) abort(404);

        SEOMeta::setTitle($category->seo->title ?? $category->name)
            ->addMeta("article:published_time", $category->created_at)
            ->addMeta("revised", $category->updated_at)
            ->addMeta("designer", env("DESIGNER"))
            ->addKeyword($category->tags(true));

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
