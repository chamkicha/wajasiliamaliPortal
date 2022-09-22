<?php

namespace App\Http\Controllers\vizimba;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class vizimbaController extends Controller
{
    public function index()
    {

        $URL  = baseUrl().'/list-kizimba';
        try{
        $vizimba  =  Http::withToken(token())->get($URL)->json();
        if ($vizimba['error']=='true')
        {
            Session::flash('alert-warning',''.$vizimba['message']);
            $vizimba =  ['data'=>array()];
        }
        $vizimba  =  $vizimba['data'];

        $masoko_URL  = baseUrl().'/list-masoko';
        $masoko  =  Http::withToken(token())->get($masoko_URL)->json();
        if ($masoko['error']=='true')
        {
            Session::flash('alert-warning',''.$masoko['message']);
            $masoko =  ['data'=>array()];
        }
        $masoko  =  $masoko['data'];


        $tittle = 'Orodha ya Vizimba';
        return view('vizimba.index', compact('vizimba','masoko','tittle'));
        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('vizimba')->withInput();
        }

    }


    public  function  create(){

        return view('members.create');

    }

    public  function  store(Request $request){

        $URL  = baseUrl().'/register-kizimba';
        
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'name'=>$request->name,
                    'sokoId'=>$request->sokoId,
                ]
            );
            $result = json_decode($result);
            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('vizimba')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('vizimba');
        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('vizimba')->withInput();
        }

    }

    public function delete($id){
        $URL  = baseUrl().'/delete-kizimba';
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'kizimbaId'=>$id,
                ]
            );
            $result = json_decode($result);

            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('vizimba')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('fees');
        }catch (\Throwable $exception){

            Log::error('BUSINESS TYPE-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('vizimba')->withInput();
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
