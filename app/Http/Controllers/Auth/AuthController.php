<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Cookie;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request){
      
        $URL  = baseUrl().'/login';
        try{
            $result  =  Http::post($URL,
                [
                    'username'=>$request->username,
                    'password'=> $request->password
                ]
            );
            $result = json_decode($result);
            // dd($result);
            $class  =  'success';
            if($result->error == 'true'){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('/')->withInput();
            }

            $permissions = [];
            foreach($result->permissions as $permission){
                $permissions[]= $permission->permissionNames;

            }
            $permissions = json_encode($permissions);
// dd($result->user->name);
            $perm = cookie('perm', $permissions, 30);
            $token = cookie('token', $result->token, 30);
            $fullname = cookie('name', $result->user->name, 30);
            $email = cookie('email', $result->user->email, 30);
            $user_id = cookie('user_id', $result->user->id, 30);
            
            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('dashboard')
                   ->withCookies([$token, $fullname, $email,$user_id,$perm]);

        } catch (\Throwable $exception){

            
            Log::error('LOGIN-ERROR',['MESSAGE'=>$exception]);
            
            Session::flash('alert-danger',' Server error ');

            return redirect('/')->withInput();
        }

    }


    public function logout(){
        $api = baseUrl().'/logout';

        $logout = Http::withToken(token())->post($api);

        $logout = json_decode($logout);

        if ($logout->statusCode == 300)
        {
            $token = Cookie::forget('token');

            $fullname = Cookie::forget('fullname');

            $email = Cookie::forget('email');
            $perm = Cookie::forget('perm');
            $user_id = Cookie::forget('user_id');


            Session::flash('alert-success',''.$logout->message);

            return redirect('/')->withCookie($token)->withCookie($fullname)->withCookie($email)->withCookie($user_id);
        }
        else
        {
            Session::flash('alert-danger',''.$logout->message);

            return back();
        }
    }
}
