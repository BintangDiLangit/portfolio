<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CVController extends Controller
{
    public function index()
    {
        $cv = CV::orderBy('created_at', 'desc')->first();
        return view('admin.cv.index', compact('cv'));
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'file' => 'required|mimes:pdf|max:10000',
        ]);

        if ($request->hasFile('file')) {
            $cv = CV::first();
            $filename = 'cv' . uniqid() . strtolower(Str::random(10)) . '.' . $request->file->extension();
            $request->file('file')->move('file-cv/', $filename);
            $cv->path = $filename;
            $cv->save();
            return redirect(route('cv.index'))->with('status', 'CV Has been uploaded successfully');
        }
    }
}