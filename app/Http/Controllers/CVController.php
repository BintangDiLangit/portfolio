<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;

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
            $cv = new CV;
            $request->file('file')->move('file-cv/', $request->file('file')->getClientOriginalName());
            $cv->path = $request->file('file')->getClientOriginalName();
            $cv->save();
            return redirect(route('cv.index'))->with('status', 'CV Has been uploaded successfully');
        }
    }
}