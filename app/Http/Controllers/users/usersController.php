<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class usersController extends Controller
{
    public function index()
    {
    try{
        
            $shirikisho_URL  = baseUrl().'/list-shirikisho';
            $shirikishos  =  Http::withToken(token())->get($shirikisho_URL)->json();
            if ($shirikishos['error']=='true')
            {
                Session::flash('alert-warning',''.$shirikishos['message']);
                $shirikishos =  ['data'=>array()];
            }
            $shirikishos  =  $shirikishos['data'];


            $roles_URL  = baseUrl().'/view-roles';
            $roles  =  Http::withToken(token())->get($roles_URL)->json();
            if ($roles['error']=='true')
            {
                Session::flash('alert-warning',''.$roles['message']);
                $roles =  ['data'=>array()];
            }
            $roles  =  $roles['data'];


            $URL  = baseUrl().'/users';
            
            $users  =  Http::withToken(token())->get($URL)->json();
            if ($users['error']=='true')
            {
                Session::flash('alert-warning',''.$users['message']);
                $users =  ['data'=>array()];
            }
            $users  =  $users['data'];
            $tittle = 'Orodha ya Watumiaji';
            return view('users.index', compact('users','roles','shirikishos','tittle'));
            
        } catch (\Exception $exception){

            return redirect('users')->withInput();
        }

    }


    public  function  create(){

        return view('MakundiWizara.create');

    }

    public  function  store(Request $request){
        
        $URL  = baseUrl().'/register';
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'email'=>$request->email,
                    'password'=>$request->password,
                    'roleId'=>$request->role,
                    'name'=>$request->name,
                    'phoneNumber'=>$request->phno,


                ]
            );
            $result = json_decode($result);
            dd($result);

            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('users')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('users');
        }catch (\Throwable $exception){

            Log::error('users-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('users')->withInput();
        }

    }

    public function delete($id){
        $delete = User::destroy($id);

        Session::flash('error', 'Successfully Delete User');
        
        return redirect(route('users'));
    }




    public function view($id){
        $users= DB::table('users')->where('id',$id)->first();
        return view('users.view')
                ->with('users', $users);

    }
    
    public function edit($id){
        $users= DB::table('users')->where('id',$id)->first();
        $roles   = Role::get();
        return view('users.edit', compact('users','roles'));

    }

    public function update($id, Request $request){
        $updated_by = Auth::id();
        $request->merge(['updated_by'=>$updated_by]);
        if(!$request->password){
        $input = $request->except(['password']);
        }
        $input = $request->except(['_token']);
        $departments = User::where('id',$id)->update($input);

        $class  =  'success';

       Session::flash('alert-success', 'Successfully Update Departments');
       
       return redirect(route('users'));

    }
}
