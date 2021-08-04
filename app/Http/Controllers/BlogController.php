<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::orderBy('created_at', 'desc')->get();
        return view('admin.blog.index', compact('blog'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title'    => 'required|string',
            'imageHeader'    => 'required|image',
            'content'    => 'required',
        ]);
        $a = strtolower($request->title);
        $b = str_replace(' ','-',$a);

        if ($request->hasFile('imageHeader')) {
            $blg = new Blog();
            $blg->title = $request->title;
            $blg->content = $request->content;
            $blg->link_route = $b;
            $request->file('imageHeader')->move('blog-images/',$request->file('imageHeader')->getClientOriginalName());
            $blg->imageHeader = $request->file('imageHeader')->getClientOriginalName();
            $blg->save();
        }

        session()->flash('message','Blog has been created');
        return redirect(route('blog.index'));
    }

    public function edit($id)
    {
        $blog = Blog::where('id', $id)->first();
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title'    => 'required|string',
            'imageHeader'    => 'nullable|image',
            'content'    => 'required',
        ]);
        $a = strtolower($request->title);
        $b = str_replace(' ','-',$a);

        $blg = Blog::find($id);
        $blg->title = $request->title;
        $blg->link_route = $b;
        $blg->content = $request->content;
        if ($request->hasFile('imageHeader')) {
            $request->file('imageHeader')->move('blog-images/',$request->file('imageHeader')->getClientOriginalName());
            $blg->imageHeader = $request->file('imageHeader')->getClientOriginalName();
        }
        $blg->update();

        session()->flash('message','Blog has been updated');
        return redirect(route('blog.index'));
    }

    public function destroy($id)
    {
        $blg = Blog::find($id);
        $blg->delete();
        return redirect(route('blog.index'));
    }
}