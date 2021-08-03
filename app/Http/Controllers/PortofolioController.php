<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortofolioController extends Controller
{
    public function index(){
        $portofolios = Portofolio::orderBy('updated_at', 'desc')->get();
        return view('admin.portofolio.index', compact('portofolios') );
    }
    public function create(){
        return view('admin.portofolio.create');
    }
    public function store(Request $request){
        $this->validate(request(), [
            'title'    => 'required|string|max:28|min:5',
            'description'    => 'required|string',
            'rating'    => 'required|numeric',
            'client'    => 'required|string',
            'linkPorto'    => 'required',
            'image'    => 'required|image',
            'additional_description'    => 'nullable|string',
            'completed' => 'nullable|string',
        ]);
        if ($request->hasFile('image')){
            $prt = new Portofolio();
            $prt->title = $request->title;
            $prt->description = $request->description;
            $prt->rating = $request->rating;
            $prt->client = $request->client;
            $prt->linkPorto = $request->linkPorto;
            $request->file('image')->move('portofolio-images/',$request->file('image')->getClientOriginalName());
            $prt->image = $request->file('image')->getClientOriginalName();
            $prt->additional_description = $request->additional_description;
            if ($request->completed == null) {
                $prt->completed = 'Still Developed';
            }else{
                $prt->completed = $request->completed;
            }
            $prt->save();
        }

        session()->flash('message','Portofolio has been added');
        return redirect(route('portofolio.index'));
    }

    public function edit($id)
    {
        $porto = Portofolio::where('id', $id)->first();
        return view('admin.portofolio.edit', compact('porto'));
    }
    public function update(Request $request, $id){
        $this->validate(request(), [
            'title'    => 'required|string|max:28|min:5',
            'description'    => 'required|string',
            'rating'    => 'required|numeric',
            'client'    => 'required|string',
            'linkPorto'    => 'required',
            'image'    => 'nullable|image',
            'additional_description'    => 'nullable|string',
            'completed'    => 'nullable|string',
        ]);
        $prt = Portofolio::find($id);
        $prt->title = $request->title;
        $prt->description = $request->description;
        $prt->rating = $request->rating;
        $prt->client = $request->client;
        $prt->linkPorto = $request->linkPorto;
        if ($request->hasFile('image')){
            $request->file('image')->move('portofolio-images/',$request->file('image')->getClientOriginalName());
            $prt->image = $request->file('image')->getClientOriginalName();
        }
        $prt->additional_description = $request->additional_description;
        if ($request->completed == null) {
            $prt->completed = 'Still Developed';
        }else{
            $prt->completed = $request->completed;
        }
        $prt->update();

        session()->flash('message','Portofolio has been updated');
        return redirect(route('portofolio.index'));
    }

    public function destroy($id)
    {
        $portofolio = Portofolio::find($id);
        $portofolio->delete();
        return redirect(route('portofolio.index'));
    }

}