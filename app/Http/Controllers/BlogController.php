<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::orderBy('created_at', 'desc')->get();
        $blogUser = Blog::where('user_id', Auth::user()->id)->get();
        return view('admin.blog.index', compact('blog', 'blogUser'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('admin.blog.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title'    => 'required|string|max:255',
            'imageHeader'    => 'required|image',
            'content'    => 'required',
        ]);
        $a = strtolower($request->title);
        $b = str_replace(' ', '-', $a);
        $c = preg_replace('/[^A-Za-z0-9\-]/', '', $b);


        $tag_req_arr = $request["tags"];
        $tags_arr = [];

        for ($i = 0; $i < count($tag_req_arr); $i++) {
            $tags_arr[] = strtolower($tag_req_arr[$i]);
        }
        $tag_ids = [];
        foreach ($tags_arr as $tag_name) {
            $tag = Tag::where('tag_name', $tag_name)->first();
            if ($tag) {
                $tag_ids[] = $tag->id;
            } else {
                $new_tag = Tag::create([
                    'tag_name' => $tag_name
                ]);
                $tag_ids[] = $new_tag->id;
            }
        }

        if ($request->hasFile('imageHeader')) {
            $blg = new Blog();
            $blg->title = $request->title;
            $blg->content = $request->content;
            $blg->creator = Auth::user()->name;
            $blg->user_id = Auth::user()->id;
            $blg->link_route = $c;
            $request->file('imageHeader')->move('blog-images/', $request->file('imageHeader')->getClientOriginalName());
            $blg->imageHeader = $request->file('imageHeader')->getClientOriginalName();
            if ($blg->save()) {
                $blg->tags()->attach($tag_ids);
            }
        }

        return redirect(route('blog.index'))->with('success', 'Blog has been created');
    }

    public function edit($id)
    {
        $blog = Blog::where('id', $id)->first();
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title'    => 'required|string|max:255',
            'imageHeader'    => 'nullable|image',
            'content'    => 'required',
        ]);
        $a = strtolower($request->title);
        $b = str_replace(' ', '-', $a);
        $c = preg_replace('/[^A-Za-z0-9\-]/', '', $b);

        $blg = Blog::find($id);
        $blg->title = $request->title;
        $blg->link_route = $c;
        $blg->content = $request->content;
        if ($request->hasFile('imageHeader')) {
            $request->file('imageHeader')->move('blog-images/', $request->file('imageHeader')->getClientOriginalName());
            $blg->imageHeader = $request->file('imageHeader')->getClientOriginalName();
        }
        $blg->update();
        return redirect(route('blog.index'))->with('success', 'Blog has been updated');
    }

    public function destroy($id)
    {
        $blg = Blog::find($id);
        $blg->delete();
        return redirect(route('blog.index'))->with('success', 'Blog has been deleted');
    }
}