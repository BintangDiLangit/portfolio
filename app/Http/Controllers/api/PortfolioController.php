<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        $portofolios = Portofolio::orderBy('updated_at', 'desc')->get();
        return response()->json([
            'message' => 'List All Portfolio',
            'data' => $portofolios,
        ], Response::HTTP_OK);
    }
    public function show($id)
    {
        $porto = Portofolio::where('id', $id)->first();
        $countRating = $porto->rating;
        return response()->json([
            'message' => 'Detail Portfolio',
            'data' => $porto,
            'rating_porto' => $countRating
        ], Response::HTTP_OK);
    }
}