<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\CV;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CVController extends Controller
{
    public function index()
    {
        $cv = CV::first();
        return response()->json([
            'message' => 'cv',
            'data' => $cv,
        ], Response::HTTP_OK);
    }
}