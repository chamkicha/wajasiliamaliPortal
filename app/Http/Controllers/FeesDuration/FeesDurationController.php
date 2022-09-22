<?php

namespace App\Http\Controllers\FeesDuration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class FeesDurationController extends Controller
{
    
    public function index()
    {
        
        $URL  = baseUrl().'/list-fee-duration';
      
        
        try{
        $durations  =  Http::withToken(token())->get($URL)->json();
        if ($durations['error']=='true')
        {
            Session::flash('alert-warning',''.$durations['message']);
            $durations =  ['data'=>array()];
        }
        $durations  =  $durations['data'];

        $tittle = 'Muda wa Ada';
        return view('durations.index', compact('durations'));
        } catch (\Throwable $exception){

            Log::error('durations-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('durations')->withInput();
        }


    }



    public  function  store(Request $request){
        $URL  = baseUrl().'/register-fee-duration';
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'name'=>$request->name,
                    'days'=> $request->days
                ]
            );
            $result = json_decode($result);

            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('durations')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('durations');
        } catch (\Throwable $exception){

            Log::error('durations-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('durations')->withInput();
        }

    }

    public function delete($id){
        $URL  = baseUrl().'/delete-duration';
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'durationId'=>$id,
                ]
            );
            $result = json_decode($result);

            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('durations')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('durations');
        }catch (\Throwable $exception){

            Log::error('BUSINESS TYPE-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('durations')->withInput();
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
