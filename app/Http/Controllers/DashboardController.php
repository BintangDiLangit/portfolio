<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use App\Models\Client;
use App\Models\Portofolio;

class DashboardController extends Controller
{
    public function index(){
        $messages = Client::all()->count();
        $portofolio = Portofolio::all()->count();
        $certificate = Certificate::all()->count();
        return view('dashboard', compact('messages', 'portofolio', 'certificate'));
    }
}