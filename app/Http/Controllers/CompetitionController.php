<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\SEO;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $competitions = Competition::all();
        return view('admin.competition.index', compact('competitions'));
    }

    public function store(Request $request)
    {
        try {
            $this->validate(request(), [
                'title' => 'required|string|max:255|min:1',
                'desc' => 'required|string',
                'link' => 'nullable|url',
                'image' => 'required|image'
            ]);
            if ($request->hasFile('image')) {
                $compt = new Competition();
                $compt->title = $request->title;
                $compt->desc = $request->desc;
                $compt->link = $request->link;
                $compt->date = $request->date;

                $filename = 'competition' . uniqid() . strtolower(Str::random(10)) . '.' . $request->image->extension();
                $request->file('image')->move('storage/competition-images/', $filename);
                $compt->image = $filename;

                $compt->save();
            }

            $seo = SEO::first();
            $competition = Competition::count();
            $seo->forceFill([
                'winning_competitions' => $competition
            ])->save();

            session()->flash('message', 'Competition has been added');
            return redirect(route('competition.index'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
    public function update(Request $request, Competition $competition)
    {
        try {
            $this->validate(request(), [
                'title' => 'required|string|max:255|min:1',
                'desc' => 'required|string',
                'link' => 'nullable|url',
                'image' => 'nullable|image'
            ]);
            $competition->title = $request->title;
            $competition->desc = $request->desc;
            $competition->link = $request->link;
            $competition->date = $request->date;

            if ($request->hasFile('image')) {
                $filename = 'competition' . uniqid() . strtolower(Str::random(10)) . '.' . $request->image->extension();
                $request->file('image')->move('storage/competition-images/', $filename);
                $competition->image = $filename;
            }

            $competition->save();

            $seo = SEO::first();
            $competitionCount = Competition::count();
            $seo->forceFill([
                'winning_competitions' => $competitionCount
            ])->save();

            session()->flash('message', 'Competition has been updated');
            return redirect(route('competition.index'));
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }



    public function destroy(Competition $competition)
    {
        $competition->delete();
        $seo = SEO::first();
        $competitionCount = Competition::count();
        $seo->forceFill([
            'winning_competitions' => $competitionCount
        ])->save();
        return redirect(route('competition.index'));
    }
}