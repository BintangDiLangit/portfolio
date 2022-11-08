<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    protected static function rating($userBlog){

        $countBlog = $userBlog->count();;
        // dd($countBlog);
        $achievement = '';
        $star = 0;
        if ($countBlog > 0 && $countBlog<=10) {
            $achievement = 'Beginner Writer';
            $star += 1;
        }else if ($countBlog > 10 && $countBlog <= 30) {
            $achievement = 'Junior Writer';
            $star += 2;
        }else if($countBlog > 30 && $countBlog <= 50){
            $achievement = 'Writer';
            $star += 3;
        }else if($countBlog > 50){
            $achievement = 'Senior Writer';
            $star += 4;
        }else{
            $achievement = "Let's write now";
        }
        return $achievement;
    }
    public function index(){
        $users = User::withCount('blogs')->get();
        // $users = User::all();
        // $wow = $users->blogs->count();
        // $user = User::find(1)->blogs->count();

        // $rate = self::rating($users);
        // dd($rate);
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
        $dataFinal["title"] = "From main.bintangmfhd.com";
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