<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Client;
use App\Models\Portofolio;
use Illuminate\Support\Carbon;

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

    public function indexBlog(){
        $latest = Blog::orderBy('updated_at', 'desc')->limit(3)->get();
        $countLatest = $latest->count();
        $blogs = Blog::orderBy('updated_at', 'desc')->simplePaginate(2);
        return view('blog.index', compact('blogs', 'latest','countLatest'));
    }
    public function showBlog($title){
        $latest = Blog::orderBy('updated_at', 'desc')->limit(5)->get();
        $blog = Blog::where('link_route', $title)->first();
        $countLatest = $latest->count();
        $mytime = Carbon::now();
        $result = array();
        for ($i=0; $i < $countLatest; $i++) {
            $updateTime = $latest[$i]->updated_at;
            $time = \Carbon\Carbon::parse($updateTime)->diff(\Carbon\Carbon::now());
            # code...
            if ($time->format('%y') == '0' && $time->format('%m') == '0' && $time->format('%d') == '0') {
                array_push($result,$time->format('%h hours %i minutes'));
            }elseif ($time->format('%y') == '0' && $time->format('%m') == '0') {
                array_push($result,$time->format('$d days %h hours'));
            }elseif ($time->format('%y') == '0') {
                array_push($result,$time->format('$m months $d days'));
            }elseif ($time->format('%y') != '0') {
                array_push($result,$time->format('$y years $m months'));
            }
        }
        // dd($result);
        return view('blog.show', compact('blog','latest','result'));
    }

}
