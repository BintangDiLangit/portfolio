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
        $portofolios = Portofolio::orderBy('updated_at', 'desc')->get();
        return view('portofolio.index', compact('portofolios'));
    }
    public function show($id){
        $porto = Portofolio::where('id', $id)->first();
        $countRating = $porto->rating;
        return view('portofolio.show', compact('porto','countRating'));
    }

    public function indexAchievement(){
        $software = Certificate::where('type', 'software')->orderBy('updated_at', 'desc')->get();
        $security = Certificate::where('type', 'security')->orderBy('updated_at', 'desc')->get();
        $softskill = Certificate::where('type', 'softskill')->orderBy('updated_at', 'desc')->get();
        return view('certif.index', compact('software','security','softskill'));
    }
}