<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function show($id){
        $timeNow = Carbon::now()->format('d M, Y');
        $user = User::where('id', $id)->first();

        $contxt = stream_context_create([
            'ssl' => [
            'verify_peer' => FALSE,
            'verify_peer_name' => FALSE,
            'allow_self_signed'=> TRUE
            ]
            ]);
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
            $pdf->getDomPDF()->setHttpContext($contxt);
            $pdf = App::make('dompdf.wrapper');
            $pdf->loadHTML(view('appreciation.certificate', compact('timeNow','user')));
            return $pdf->stream();
        // return PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('appreciation.certificate', compact('timeNow','user'))->stream();
        // return view('appreciation.certificate',compact('timeNow','user'));
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('user.index'))->with('success','User has been deleted');
    }
}