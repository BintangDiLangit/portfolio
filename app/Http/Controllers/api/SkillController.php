<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('created_at', 'desc')->get();
        return response()->json([
            'message' => 'Skills',
            'data' => $skills,
        ], Response::HTTP_OK);
    }
}