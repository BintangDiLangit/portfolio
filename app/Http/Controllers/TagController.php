<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show($tag_id)
    {
        $tag = Tag::find($tag_id);
        $list = $tag->blogs;
        $latest = Blog::orderBy('updated_at', 'desc')->limit(3)->get();
        $contributor = User::all();
        return view('tags.list', compact('list', 'tag','contributor'));
    }
}