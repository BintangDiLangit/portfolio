<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('created_at', 'desc')->get();
        return view('admin.certificate.index', compact('certificates'));
    }
    public function create()
    {
        return view('admin.certificate.create');
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name'    => 'required|string|max:100|min:5',
            'imgCert'    => 'required|image',
            'linkCert'    => 'nullable',
            'type'    => 'required',
        ]);
        if ($request->hasFile('imgCert')){
            $crt = new Certificate();
            $crt->name = $request->name;
            $crt->linkCert = $request->linkCert;
            $crt->type = $request->type;
            $request->file('imgCert')->move('certificate-images/',$request->file('imgCert')->getClientOriginalName());
            $crt->imgCert = $request->file('imgCert')->getClientOriginalName();
            $crt->save();
        }

        session()->flash('message','Certificate has been added');
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
            'name'    => 'required|string|max:100|min:5',
            'imgCert'    => 'nullable|image',
            'linkCert'    => 'nullable|string',
            'type'    => 'required',
        ]);
        $crt = Certificate::find($id);
        $crt->name = $request->name;
        $crt->linkCert = $request->linkCert;
        $crt->type = $request->type;
        if ($request->hasFile('imgCert')){
            $request->file('imgCert')->move('certificate-images/',$request->file('imgCert')->getClientOriginalName());
            $crt->imgCert = $request->file('imgCert')->getClientOriginalName();
        }
            $crt->update();
        session()->flash('message','Certificate has been updated');
        return redirect(route('certificate.index'));

    }
    public function destroy($id)
    {
        $certificate = Certificate::find($id);
        $certificate->delete();
        return redirect(route('certificate.index'));
    }
}