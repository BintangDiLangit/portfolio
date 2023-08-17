<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompetitionController extends Controller
{
    public function index(Request $request)
    {
        $portofolios = Competition::orderBy('updated_at', 'desc')->get();
        return response()->json([
            'message' => 'List All Competition',
            'data' => $portofolios,
        ], Response::HTTP_OK);
    }
    public function show($id)
    {
        $comp = Competition::where('id', $id)->first();
        if (isset($comp)) {
            return response()->json([
                'message' => 'Detail Competition',
                'data' => $comp
            ], Response::HTTP_OK);
        }
        return response()->json([
            'message' => 'Detail Competition Not Found'
        ], Response::HTTP_NOT_FOUND);
    }
}