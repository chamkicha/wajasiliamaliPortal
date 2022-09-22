<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class permissionController extends Controller
{
    
    public function index()
    {

        $URL  = baseUrl().'/view-permissions';
       
        
        try{
            $permissions  =  Http::withToken(token())->get($URL)->json();
        if ($permissions['error']=='true')
        {
            Session::flash('alert-warning',''.$permissions['message']);
            $permissions =  ['data'=>array()];
        }
        $permissions  =  $permissions['data'];
        $tittle = 'Orodha ya Ruhusa';
// dd($permissions);
        return view('permission.index', compact('permissions','tittle'));
        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('permissions')->withInput();
        }

    }


    public  function  create(){

        return view('members.create');

    }

    public  function  store(Request $request){

        $URL  = baseUrl().'/create-permissions';
        
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'name'=>$request->name,
                ]
            );
            $result = json_decode($result);
            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('permissions')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('permissions');
        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('permissions')->withInput();
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
