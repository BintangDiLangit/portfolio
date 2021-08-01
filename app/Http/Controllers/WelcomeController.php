<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Client;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        $messages = Client::all();
        return view('welcome', compact('messages'));
    }

    public function indexPortofolio(){
        $portofolios = Portofolio::all();
        return view('portofolio.index', compact('portofolios'));
    }
    public function show($id){
        $porto = Portofolio::where('id', $id)->first();
        $countRating = $porto->rating;
        return view('portofolio.show', compact('porto','countRating'));
    }

    public function indexAchievement(){
        $achievements = Certificate::all();
        return view('certif.index', compact('achievements'));
    }
}