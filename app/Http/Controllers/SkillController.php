<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::orderBy('created_at', 'desc')->get();
        return view('admin.skill.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skill.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'skill_name'    => 'required|string|max:28',
            'skill_img'    => 'required|image',
            'skill_desc'    => 'required|string',
        ]);
        if ($request->hasFile('skill_img')){
            $skl = new Skill();
            $skl->skill_name = $request->skill_name;
            $skl->skill_desc = $request->skill_desc;
            $request->file('skill_img')->move('skill-images/',$request->file('skill_img')->getClientOriginalName());
            $skl->skill_img = $request->file('skill_img')->getClientOriginalName();
            $skl->save();
        }

        session()->flash('message','Skill has been added');
        return redirect(route('skill.index'));
    }

    public function edit($id)
    {
        $skill = Skill::where('id', $id)->first();
        return view('admin.skill.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'skill_name'    => 'required|string|max:28',
            'skill_img'    => 'image',
            'skill_desc'    => 'required|string',
        ]);
        $skl = Skill::find($id);
        $skl->skill_name = $request->skill_name;
        $skl->skill_desc = $request->skill_desc;
        if ($request->hasFile('skill_img')){
            $request->file('skill_img')->move('skill-images/',$request->file('skill_img')->getClientOriginalName());
            $skl->skill_img = $request->file('skill_img')->getClientOriginalName();
        }
        $skl->update();

        session()->flash('message','Skill has been updated');
        return redirect(route('skill.index'));
    }

    public function destroy($id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return redirect(route('skill.index'));
    }
}