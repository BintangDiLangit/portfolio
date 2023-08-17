<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.certificate.index', compact('certificates'));
    }
    public function create()
    {
        return view('admin.certificate.create');
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:100|min:5',
            'imgCert' => 'required|image',
            'linkCert' => 'nullable',
            'type' => 'required',
        ]);
        if ($request->hasFile('imgCert')) {
            $crt = new Certificate();
            $crt->name = $request->name;
            $crt->linkCert = $request->linkCert;
            $crt->type = $request->type;

            $filename = 'cert' . uniqid() . strtolower(Str::random(10)) . '.' . $request->imgCert->extension();
            $path = $request->file('imgCert')->storeAs('storage/certificate-images/', $filename, 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $crt->imgCert = $filename;

            $crt->save();
        }

        session()->flash('message', 'Certificate has been added');
        return redirect(route('certificate.index'));
    }
    public function edit($id)
    {
        $cert = Certificate::where('id', $id)->first();
        return view('admin.certificate.edit', compact('cert'));
    }
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:100|min:5',
            'imgCert' => 'nullable|image',
            'linkCert' => 'nullable|string',
            'type' => 'required',
        ]);
        $crt = Certificate::find($id);
        $crt->name = $request->name;
        $crt->linkCert = $request->linkCert;
        $crt->type = $request->type;
        if ($request->hasFile('imgCert')) {
            $oldImage = $crt->imgCert;
            $filename = 'cert' . uniqid() . strtolower(Str::random(10)) . '.' . $request->imgCert->extension();
            $path = $request->file('imgCert')->storeAs('storage/certificate-images/', $filename, 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $crt->imgCert = $filename;
            Storage::disk('s3')->delete('storage/certificate-images/' . $oldImage);
        }
        $crt->update();
        session()->flash('message', 'Certificate has been updated');
        return redirect(route('certificate.index'));
    }
    public function destroy($id)
    {
        $certificate = Certificate::find($id);
        Storage::disk('s3')->delete('storage/certificate-images/' . $certificate->imgCert);
        $certificate->delete();
        return redirect(route('certificate.index'));
    }
}