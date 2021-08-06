<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function show($id){
        $timeNow = Carbon::now()->format('d M, Y');
        $user = User::where('id', $id)->first();

        $path = base_path('public/appreciation/beginner_writer/coa.jpg');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $pic = 'data:image/' . $type . ';base64,' . base64_encode($data);

        $path2 = base_path('public/appreciation/beginner_writer/ttd_qr.png');
        $type2 = pathinfo($path2, PATHINFO_EXTENSION);
        $data2 = file_get_contents($path2);
        $pic2 = 'data:image/' . $type2 . ';base64,' . base64_encode($data2);

        $pdf = PDF::loadview('appreciation.certificate', compact('timeNow','user','pic','pic2'));
        return $pdf->stream($user->name.'_Beginner Writer Certificate.pdf');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('user.index'))->with('success','User has been deleted');
    }
}