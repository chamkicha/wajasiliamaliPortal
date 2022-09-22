<?php

namespace App\Http\Controllers\Vikundi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class VikundiController extends Controller
{
    public function index()
    {
        
        $URL  = baseUrl().'/list-groups';
        try{
        $groups  =  Http::withToken(token())->get($URL)->json();
        if ($groups['error']=='true')
        {
            Session::flash('alert-warning',''.$groups['message']);
            $groups =  ['data'=>array()];
        }
        $groups  =  $groups['data'];

        $shirikisho_URL  = baseUrl().'/list-shirikisho';
        $shirikishos  =  Http::withToken(token())->get($shirikisho_URL)->json();
        if ($shirikishos['error']=='true')
        {
            Session::flash('alert-warning',''.$shirikishos['message']);
            $shirikishos =  ['data'=>array()];
        }
        $shirikishos  =  $shirikishos['data'];

        $regions_URL  = baseUrl().'/regions';
        $regions  =  Http::withToken(token())->get($regions_URL)->json();
        if ($regions['error']=='true')
        {
            Session::flash('alert-warning',''.$regions['message']);
            $regions =  ['data'=>array()];
        }
        $regions  =  $regions['data'];
        // dd($groups);
        $tittle = 'Orodha ya Vikundi';
        return view('Vikundi.index', compact('groups','shirikishos','regions','tittle'));
        } catch (\Throwable $exception){

            Log::error('Vikundi-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('Vikundi')->withInput();
        }

    }


    public  function  create(){

        return view('Vikundi.create');

    }

    public  function  store(Request $request){
        $URL  = baseUrl().'/register-groups';
       
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'name'=>$request->name,
                    'wardId'=> $request->ward,
                    'shirikishoId'=> $request->shirikishoId
                ]
            );
            $result = json_decode($result);

            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('Vikundi')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('Vikundi');
        } catch (\Throwable $exception){

            Log::error('Vikundi-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('Vikundi')->withInput();
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
