<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Certificate;
use App\Models\Client;
use App\Models\Portofolio;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Spatie\Analytics\AnalyticsFacade as Analytics;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    public function index()
    {
        $blogAll = Blog::all()->count();
        $blogUser = Blog::where('creator', Auth::user()->name)->count();
        $tags = Tag::all()->count();
        $achievement = '';
        $star = 0;
        if ($blogUser > 0 && $blogUser <= 10) {
            $achievement = 'Beginner Writer';
            $star += 1;
        } else if ($blogUser > 10 && $blogUser <= 30) {
            $achievement = 'Junior Writer';
            $star += 2;
        } else if ($blogUser > 30 && $blogUser <= 50) {
            $achievement = 'Writer';
            $star += 3;
        } else if ($blogUser > 50) {
            $achievement = 'Senior Writer';
            $star += 4;
        } else {
            $achievement = "Let's write now";
        }
        return view('dashboard', compact('blogAll', 'blogUser', 'tags', 'achievement', 'star'));
    }
    public function indexAdmin()
    {
        //retrieve visitors and pageview data for the current day and the last seven days
        $analyticsData1 = Analytics::fetchVisitorsAndPageViews(Period::days(7));

        //retrieve visitors and pageviews since the 6 months ago
        $analyticsData2 = Analytics::fetchVisitorsAndPageViews(Period::months(6));

        //retrieve sessions and pageviews with yearMonth dimension since 1 year ago
        $analyticsData3 = Analytics::performQuery(
            Period::years(1),
            'ga:sessions',
            [
                'metrics' => 'ga:sessions, ga:pageviews',
                'dimensions' => 'ga:yearMonth'
            ]
        );
        $messages = Client::all()->count();
        $portofolio = Portofolio::all()->count();
        $certificate = Certificate::all()->count();
        return view('dashboardAdmin', compact('messages', 'portofolio', 'certificate', 'analyticsData1'));
    }
}