<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;

class CVController extends Controller
{
    public function index()
    {
        $cv = CV::all();
        return view('admin.cv.index',compact('cv'));
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'file' => 'required|mimes:pdf|max:10000',
        ]);

        if ($request->hasFile('file')){
            $cv = new CV;
            $cvv = CV::all();
            $request->file('file')->move('file-cv/','cv.pdf');
            if ($cvv == null ) {
                $cv->path = 'cv.pdf';
                $cv->save();
            }
            $cv->update();
            return redirect(route('cv.index'))->with('status', 'CV Has been uploaded successfully');
        }
    }
}