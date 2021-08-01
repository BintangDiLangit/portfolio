<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

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
            'name'    => 'required|string|max:100|min:5',
            'photo'    => 'required|image',
            'clientMessage' => 'required|string|min:5',
        ]);
        if ($request->hasFile('photo')){
            $cli = new Client();
            $cli->name = $request->name;
            $cli->clientMessage = $request->clientMessage;
            $request->file('photo')->move('client-images/',$request->file('photo')->getClientOriginalName());
            $cli->photo = $request->file('photo')->getClientOriginalName();
            $cli->save();
        }

        session()->flash('message','Client has been added');
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
            'name'    => 'required|string|max:100|min:5',
            'photo'    => 'required|image',
            'clientMessage'    => 'nullable|string',
        ]);
        if ($request->hasFile('photo')){
            $cli = Client::find($id);
            $cli->name = $request->name;
            $cli->clientMessage = $request->clientMessage;
            $request->file('photo')->move('client-images/',$request->file('photo')->getClientOriginalName());
            $cli->photo = $request->file('photo')->getClientOriginalName();
            $cli->update();
        }
        session()->flash('message','Client has been updated');
        return redirect(route('client.index'));
    }
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect(route('client.index'));
    }

}