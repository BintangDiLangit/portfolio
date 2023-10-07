<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::all();
        return response()->json($certificates);
    }
    public function show($id)
    {
        $certificate = Certificate::find($id);
        return response()->json($certificate);
    }
}