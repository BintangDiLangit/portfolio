<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\SEO;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SEOController extends Controller
{
    public function index()
    {
        $seo = SEO::all();
        return response()->json([
            'message' => 'SEO',
            'data' => $seo,
        ], Response::HTTP_OK);
    }
}