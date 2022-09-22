<?php

namespace App\Http\Controllers\Applications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ApplicationsController extends Controller
{

    public function index()
    {

        $URL  = baseUrl().'/list-applications';
       
        try{
        
        $applications  =  Http::withToken(token())->get($URL)->json();
        if ($applications['error']=='true')
        {
            Session::flash('alert-warning',''.$applications['message']);
            $applications =  ['data'=>array()];
        }
        $applications  =  $applications['data'];
        $regions_URL  = baseUrl().'/regions';
        $regions  =  Http::withToken(token())->get($regions_URL)->json();
        if ($regions['error']=='true')
        {
            Session::flash('alert-warning',''.$regions['message']);
            $regions =  ['data'=>array()];
        }
        $regions  =  $regions['data'];

        $tittle = 'Orodha ya Maombi';
        return view('applications.index', compact('applications','tittle','regions'));

        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('applications')->withInput();
        }

    }


    public  function  create(){

        return view('applications.create');

    }

    public  function  store(Request $request){
        $URL  = baseUrl().'/register-applications';
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'name'=>$request->name,
                    'code'=>$request->code,
                ]
            );
            $result = json_decode($result);
            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('applications')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('applications');
        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('applications')->withInput();
        }

    }

    public function delete($id){
        $URL  = baseUrl().'/delete-applications';
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'applicationsId'=>$id,
                ]
            );
            $result = json_decode($result);

            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('applications')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('applications');
        }catch (\Throwable $exception){

            Log::error('BUSINESS TYPE-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('applications')->withInput();
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
