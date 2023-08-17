<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CVController extends Controller
{
    public function index()
    {
        $cv = CV::first();
        return view('admin.cv.index', compact('cv'));
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'file' => 'required|mimes:pdf|max:10000',
        ]);

        if ($request->hasFile('file')) {
            $cv = CV::first();
            $oldFile = $cv->path;
            $filename = 'cv' . uniqid() . strtolower(Str::random(10)) . '.' . $request->file->extension();

            $path = $request->file('file')->storeAs('storage/file-cv/', $filename, 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $cv->path = $filename;
            Storage::disk('s3')->delete('storage/file-cv/' . $oldFile);
            $cv->save();
            return redirect(route('cv.index'))->with('status', 'CV Has been uploaded successfully');
        }
    }
}