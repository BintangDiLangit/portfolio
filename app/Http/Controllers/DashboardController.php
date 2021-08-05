<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Client;
use App\Models\Portofolio;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $blogAll = Blog::all()->count();
        $blogUser = Blog::where('creator',Auth::user()->name)->count();
        $tags = Tag::all()->count();
        $achievement = '';
        if ($blogUser > 0 && $blogUser<=10) {
            $achievement = 'Beginner Writer';
        }else if ($blogUser > 10 && $blogUser <= 30) {
            $achievement = 'Junior Writer';
        }else if($blogUser > 30 && $blogUser <= 50){
            $achievement = 'Writer';
        }else if($blogUser > 50){
            $achievement = 'Senior Writer';
        }else{
            $achievement = 'Not a Contributor';
        }
        return view('dashboard', compact('blogAll', 'blogUser','tags','achievement'));
    }
    public function indexAdmin(){
        $messages = Client::all()->count();
        $portofolio = Portofolio::all()->count();
        $certificate = Certificate::all()->count();
        return view('dashboardAdmin', compact('messages', 'portofolio', 'certificate'));
    }
}
