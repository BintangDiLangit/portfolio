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
        $portofolios = Portofolio::orderBy('updated_at', 'desc')->take(10)->get();
        return response()->json([
            'message' => 'List All Portfolio',
            'data' => $portofolios,
            'count' => count($portofolios)
        ], Response::HTTP_OK);
    }
    public function show($id)
    {
        $porto = Portofolio::where('id', $id)->first();
        if (isset($porto)) {
            $countRating = $porto->rating;
            return response()->json([
                'message' => 'Detail Portfolio',
                'data' => $porto,
                'rating_porto' => $countRating
            ], Response::HTTP_OK);
        }
        return response()->json([
            'message' => 'Detail Portfolio Not Found'
        ], Response::HTTP_NOT_FOUND);
    }

    public function loadMore($skip)
    {
        $portfolios = Portofolio::orderBy('updated_at', 'desc')->skip($skip)->take(10)->get();
        return response()->json([
            'message' => 'List All Portfolio',
            'data' => $portfolios,
            'count' => count($portfolios)
        ]);
    }
}