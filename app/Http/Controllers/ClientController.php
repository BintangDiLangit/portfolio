<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\SEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin.client.index', compact('clients'));
    }
    public function create()
    {
        return view('admin.client.create');
    }
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:100|min:5',
            'photo' => 'required|image',
            'clientMessage' => 'required|string|min:5',
        ]);
        if ($request->hasFile('photo')) {
            $cli = new Client();
            $cli->name = $request->name;
            $cli->clientMessage = $request->clientMessage;

            $filename = 'client_image' . uniqid() . strtolower(Str::random(10)) . '.' . $request->photo->extension();
            $path = $request->file('photo')->storeAs('storage/client-images/', $filename, 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $cli->photo = $filename;

            $cli->save();
        }

        $seo = SEO::first();
        $client = Client::count();
        $seo->forceFill([
            'happy_clients' => $client
        ])->save();

        session()->flash('message', 'Client has been added');
        return redirect(route('client.index'));
    }
    public function edit($id)
    {
        $client = Client::where('id', $id)->first();
        return view('admin.client.edit', compact('client'));
    }
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required|string|max:100|min:5',
            'photo' => 'required|image',
            'clientMessage' => 'nullable|string',
        ]);
        if ($request->hasFile('photo')) {
            $cli = Client::find($id);
            $oldPhoto = $cli->photo;
            $cli->name = $request->name;
            $cli->clientMessage = $request->clientMessage;
            $filename = 'client_image' . uniqid() . strtolower(Str::random(10)) . '.' . $request->photo->extension();
            $path = $request->file('photo')->storeAs('storage/client-images/', $filename, 's3');
            Storage::disk('s3')->setVisibility($path, 'public');
            $cli->photo = $filename;
            $cli->save();

            Storage::disk('s3')->delete('storage/client-images/' . $oldPhoto);
        }
        session()->flash('message', 'Client has been updated');
        return redirect(route('client.index'));
    }
    public function destroy($id)
    {
        $client = Client::find($id);
        Storage::disk('s3')->delete('storage/client-images/' . $client->photo);
        $client->delete();
        $seo = SEO::first();
        $client = Client::count();
        $seo->forceFill([
            'happy_clients' => $client
        ])->save();
        return redirect(route('client.index'));
    }
}