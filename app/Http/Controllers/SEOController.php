<?php

namespace App\Http\Controllers;

use App\Models\SEO;
use App\Services\ImageService;
use Illuminate\Http\Request;

class SEOController extends Controller
{
    public function index(Request $request)
    {
        $seo = SEO::first();
        session()->flash('message', 'Welcome to SEO');
        return view('admin.seo.index', compact('seo'));
    }
    public function update(Request $request, ImageService $imageService)
    {
        $data = $request->all();
        $seo = SEO::first();
        if (!empty($data['name'])) {
            $seo->forceFill([
                'name' => $data['name']
            ])->save();
        }
        if (!empty($data['job_title'])) {
            $seo->forceFill([
                'job_title' => $data['job_title']
            ])->save();
        }
        if (!empty($data['introducing'])) {
            $seo->forceFill([
                'introducing' => $data['introducing']
            ])->save();
        }
        if (!empty($data['years_experience'])) {
            $seo->forceFill([
                'years_experience' => $data['years_experience']
            ])->save();
        }
        if (!empty($data['happy_clients'])) {
            $seo->forceFill([
                'happy_clients' => $data['happy_clients']
            ])->save();
        }
        if (!empty($data['winning_competitions'])) {
            $seo->forceFill([
                'winning_competitions' => $data['winning_competitions']
            ])->save();
        }
        if (!empty($data['project_done'])) {
            $seo->forceFill([
                'project_done' => $data['project_done']
            ])->save();
        }
        if (!empty($data['phone_number'])) {
            $seo->forceFill([
                'phone_number' => $data['phone_number']
            ])->save();
        }
        if (!empty($data['address'])) {
            $seo->forceFill([
                'address' => $data['address']
            ])->save();
        }
        if (!empty($data['email'])) {
            $seo->forceFill([
                'email' => $data['email']
            ])->save();
        }
        if (!empty($data['instagram'])) {
            $seo->forceFill([
                'instagram' => $data['instagram']
            ])->save();
        }
        if (!empty($data['linkedin'])) {
            $seo->forceFill([
                'linkedin' => $data['linkedin']
            ])->save();
        }
        if (!empty($data['github'])) {
            $seo->forceFill([
                'github' => $data['github']
            ])->save();
        }
        if (!empty($data['gitlab'])) {
            $seo->forceFill([
                'gitlab' => $data['gitlab']
            ])->save();
        }
        if (!empty($data['medium'])) {
            $seo->forceFill([
                'medium' => $data['medium']
            ])->save();
        }
        if (!empty($data['youtube'])) {
            $seo->forceFill([
                'youtube' => $data['youtube']
            ])->save();
        }

        if ($request->hasFile('main_image')) {
            $oldImage = $seo->main_image;
            $filename = $imageService->storeImage($request->file('main_image'), 'storage/main_image/', $oldImage);
            $seo->forceFill([
                'main_image' => $filename
            ])->save();
        }

        $seo = SEO::first();
        return redirect()->back();
    }
}