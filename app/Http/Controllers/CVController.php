<?php

namespace App\Http\Controllers;

use App\Models\CV;
use Illuminate\Http\Request;

class CVController extends Controller
{
    public function index()
    {
        $cv = CV::all();
        return view('admin.cv.index', compact('cv'));
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'file' => 'required|mimes:pdf|max:10000',
        ]);

        if ($request->hasFile('file')) {
            $cvv = count(CV::all());
            if ($cvv == 0) {
                $cv = new CV;
                $request->file('file')->move('file-cv/', 'cv.pdf');
                $cv->path = 'cv.pdf';
                $cv->save();
            } else {
                $cvUpdate = cv::find('1');
                $request->file('file')->move('file-cv/', 'cv.pdf');
                $cvUpdate->path = 'cv.pdf';
                $cvUpdate->update();
            }
            return redirect(route('cv.index'))->with('status', 'CV Has been uploaded successfully');
        }
    }
}