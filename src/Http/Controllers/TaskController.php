<?php

namespace Apel\Rexoit\Http\Controllers;

use Apel\Rexoit\Models\Activity;
use App\Http\Controllers\Controller;
use Apel\Rexoit\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
class TaskController extends Controller
{
    public function index()
    {
        return view('rexoit::auth.login');
    }

    public function registration()
    {
        return view('rexoit::auth.registration');
    }

    public function savereg(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'usertype' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $request->usertype
        ]);
        return redirect('login')->with('success','Registration Successfully');
    }

    public function LoginUser(Request $request)
    {
        
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){

                $request->session()->put('LoginID',$user->id);
                $usertype = User::where('id','=', $request->session()->get('LoginID'))->first();
                Activity::create([
                    'activity_name'=>$usertype->usertype,
                    'lattitude'=>$request->latitude,
                    'longitude'=>$request->longitude,
                    'user_id'=>$user->id,
                ]);
                return redirect('dashboard')->with('success','login successfullt..');
            }else{
                return redirect('login')->with('error','password not match');
            }
        }else{
            return redirect('login')->with('error','error');
        }
    }

    public function Dashboard(Request $request)
    {
        $data = array();
        if($request->session()->get('LoginID')){
            $data = User::where('id','=', $request->session()->get('LoginID'))->first();
        }
        if($data->usertype=='admin'){
            $location = DB::table('activities','a')
                        ->leftJoin('users','a.user_id','=','users.id')
                        ->select('users.name','users.email','users.usertype','a.activity_name as acname','a.lattitude','a.longitude')
                        ->groupBy('a.user_id')
                        ->orderBy('a.created_at','DESC')
                        ->get();
        }else{
            $location = DB::table('activities','a')
                        ->leftJoin('users','a.user_id','=','users.id')
                        ->select('users.name as name','users.email as email','users.usertype','a.activity_name as acname','a.lattitude as lattitude','a.longitude as longitude')
                        ->where('users.id',$request->session()->get('LoginID'))
                        ->orderBy('a.created_at','DESC')
                        ->take(1)
                        ->get();
        }
       return view('rexoit::dashboard')->with(compact('location'));
    }

    public function logout(Request $request)
    {
        if($request->session()->get('LoginID')){
            $request->session()->pull('LoginID');
            return redirect('login');
        }
    }
}
