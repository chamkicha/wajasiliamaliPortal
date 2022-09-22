<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class roleController extends Controller
{
    public function index()
    {
    try{

            $URL  = baseUrl().'/view-roles';
            
            $roles  =  Http::withToken(token())->get($URL)->json();
            if ($roles['error']=='true')
            {
                Session::flash('alert-warning',''.$roles['message']);
                $roles =  ['data'=>array()];
            }
            $roles  =  $roles['data'];



            $permissions_URL  = baseUrl().'/view-permissions';
            $permissions  =  Http::withToken(token())->get($permissions_URL)->json();
            if ($permissions['error']=='true')
            {
                Session::flash('alert-warning',''.$permissions['message']);
                $permissions =  ['data'=>array()];
            }
            $permissions  =  $permissions['data'];

            // dd($permissions);
            $tittle = 'Orodha ya Roles';
            return view('roles.index', compact('roles','tittle','permissions'));
            
        } catch (\Exception $exception){

            return redirect('roles')->withInput();
        }

    }


    public  function  create(){

        return view('MakundiWizara.create');

    }

    public  function  store(Request $request){

        $URL  = baseUrl().'/roles-permissions';
       
        $permissions = [];
        foreach($request->permissions as $permission) {
            $permissions[] = $permission;
        }
        // dd($permissions);

        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'role_name'=>$request->name,
                    'role_pemissions'=>$permissions,
                ]
            );
            $result = json_decode($result);

            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('roles')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('roles');
        }catch (\Throwable $exception){

            Log::error('MakundiWizara-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('roles')->withInput();
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
