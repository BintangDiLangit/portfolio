<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use App\Models\SEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortofolioController extends Controller
{
    public function index()
    {
        $portofolios = Portofolio::orderBy('updated_at', 'desc')->get();
        return view('admin.portofolio.index', compact('portofolios'));
    }
    public function create()
    {
        return view('admin.portofolio.create');
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|string|max:255|min:1',
            'description' => 'required|string',
            'rating' => 'required|numeric',
            'client' => 'required|string',
            'linkPorto' => 'required',
            'image' => 'required|image',
            'additional_description' => 'nullable|string',
            'completed' => 'nullable|string',
        ]);
        if ($request->hasFile('image')) {
            $prt = new Portofolio();
            $prt->title = $request->title;
            $prt->description = $request->description;
            $prt->rating = $request->rating;
            $prt->client = $request->client;
            $prt->linkPorto = $request->linkPorto;

            $filename = 'portfolio' . uniqid() . strtolower(Str::random(10)) . '.' . $request->image->extension();
            $path = $request->file('image')->storeAs('storage/portofolio-images/', $filename, 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $prt->image = $filename;

            $prt->additional_description = $request->additional_description;
            if ($request->completed == null) {
                $prt->completed = 'Still Developed';
            } else {
                $prt->completed = $request->completed;
            }
            $prt->save();
        }

        $seo = SEO::first();
        $portfolio = Portofolio::count();
        $seo->forceFill([
            'project_done' => $portfolio
        ])->save();

        session()->flash('message', 'Portofolio has been added');
        return redirect(route('portofolio.index'));
    }

    public function edit($id)
    {
        $porto = Portofolio::where('id', $id)->first();
        return view('admin.portofolio.edit', compact('porto'));
    }
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'title' => 'required|string|max:255|min:1',
            'description' => 'required|string',
            'rating' => 'required|numeric',
            'client' => 'required|string',
            'linkPorto' => 'required',
            'image' => 'nullable|image',
            'additional_description' => 'nullable|string',
            'completed' => 'nullable|string',
        ]);
        $prt = Portofolio::find($id);
        $prt->title = $request->title;
        $prt->description = $request->description;
        $prt->rating = $request->rating;
        $prt->client = $request->client;
        $prt->linkPorto = $request->linkPorto;
        if ($request->hasFile('image')) {
            $oldImage = $prt->image;

            $filename = 'portfolio' . uniqid() . strtolower(Str::random(10)) . '.' . $request->image->extension();
            $path = $request->file('image')->storeAs('storage/portofolio-images/', $filename, 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $prt->image = $filename;

            Storage::disk('s3')->delete('storage/portofolio-images/' . $oldImage);
        }
        $prt->additional_description = $request->additional_description;
        if ($request->completed == null) {
            $prt->completed = 'Still Developed';
        } else {
            $prt->completed = $request->completed;
        }
        $prt->update();

        session()->flash('message', 'Portofolio has been updated');
        return redirect(route('portofolio.index'));
    }

    public function destroy($id)
    {
        $portofolio = Portofolio::find($id);
        Storage::disk('s3')->delete('storage/portofolio-images/' . $portofolio->image);
        $portofolio->delete();
        $seo = SEO::first();
        $portfolio = Portofolio::count();
        $seo->forceFill([
            'project_done' => $portfolio
        ])->save();
        return redirect(route('portofolio.index'));
    }
}