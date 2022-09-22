<?php

namespace App\Http\Controllers\BusinessType;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class BusinessTypeController extends Controller
{
    public function index()
    {


        $URL  = baseUrl().'/view-business-type';
      
         try{
            $BusinessTypes  =  Http::withToken(token())->get($URL)->json();

        if ($BusinessTypes['error']=='true')
        {
            Session::flash('alert-warning',''.$BusinessTypes['message']);
            $BusinessTypes =  ['data'=>array()];
        }
        $BusinessTypes  =  $BusinessTypes['data'];
        $tittle = 'Orodha ya Aina za Biashara';
        return view('BusinessType.index', compact('BusinessTypes','tittle'));
        
            }catch (\Throwable $exception){
            Session::flash('alert-danger',' Server error ');
            return redirect('BusinessType')->withInput();
        }

    }


    public  function  create(){

        return view('BusinessType.create');

    }

    public  function  store(Request $request){

        $URL  = baseUrl().'/register-business-type';
       
        
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
                return redirect('BusinessType')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('BusinessType');
        }catch (\Throwable $exception){

            Log::error('BUSINESS TYPE-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('BusinessType')->withInput();
        }

    }

    public function delete($id){
        $URL  = baseUrl().'/delete-business-type';
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'businessId'=>$id,
                ]
            );
            $result = json_decode($result);

            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('BusinessType')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('BusinessType');
        }catch (\Throwable $exception){

            Log::error('BUSINESS TYPE-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('BusinessType')->withInput();
        }
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
