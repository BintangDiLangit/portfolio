<?php

namespace App\Http\Controllers;
use App\Models\Certificate;

class ApiCertificateController extends Controller
{
    public function index(){
        $certificates = Certificate::all();
        return response()->json($certificates);
    }
    public function show($id){
        $certificate = Certificate::find($id);
        return response()->json($certificate);
    }
}