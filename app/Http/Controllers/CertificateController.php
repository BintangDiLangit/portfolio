<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Services\ImageService;
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
    public function store(Request $request, ImageService $imageService)
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
            $filename = $imageService->storeImage($request->file('imgCert'), 'storage/certificate-images/');
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
    public function update(Request $request, $id, ImageService $imageService)
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
            $filename = $imageService->storeImage($request->file('imgCert'), 'storage/certificate-images/', $oldImage);
            $crt->imgCert = $filename;
        }
        $crt->update();
        session()->flash('message', 'Certificate has been updated');
        return redirect(route('certificate.index'));
    }
    public function destroy($id, ImageService $imageService)
    {
        $certificate = Certificate::find($id);
        $imageService->deleteFromS3('storage/certificate-images/', $certificate->imgCert);
        $certificate->delete();
        return redirect(route('certificate.index'));
    }
}