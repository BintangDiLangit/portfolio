<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

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

        $dataFinal["email"] = $user->email;
        $dataFinal["title"] = "From bintangmfhd.tech";
        $dataFinal["body"] = "Selamat atas pencapaiannya";
        $pdf = PDF::loadview('appreciation.certificate', compact('timeNow','user','pic','pic2'));
        Mail::send(['text' => 'appreciation.word'],$dataFinal, function($message)use($dataFinal, $pdf) {
            $message->to($dataFinal["email"], $dataFinal["email"])
                    ->subject($dataFinal["title"])
                    ->attachData($pdf->output(), 'Beginner Writer Certificate.pdf');
        });
        return redirect(route('user.index'))->with('success','Mail sent successfully');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('user.index'))->with('success','User has been deleted');
    }
}