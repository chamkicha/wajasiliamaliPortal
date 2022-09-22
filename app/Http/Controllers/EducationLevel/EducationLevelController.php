<?php

namespace App\Http\Controllers\EducationLevel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;


class EducationLevelController extends Controller
{
    public function index()
    {

        $URL  = baseUrl().'/education-level-list';
       
        
        try{
            $educations  =  Http::withToken(token())->get($URL)->json();
        if ($educations['error']=='true')
        {
            Session::flash('alert-warning',''.$educations['message']);
            $educations =  ['data'=>array()];
        }
        $educations  =  $educations['data'];
        // dd($educations);
        $tittle = 'Orodha ya Elimu';
        return view('educations.index', compact('educations','tittle'));
        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('educations')->withInput();
        }

    }


    public  function  create(){

        return view('educations.create');

    }

    public  function  store(Request $request){

        $URL  = baseUrl().'/register-education-level';
        
        
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
                return redirect('educations')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('educations');
        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('educations')->withInput();
        }

    }

    public function delete($id){
        $delete = User::destroy($id);

        Session::flash('error', 'Successfully Delete User');
        
        return redirect(route('educations'));
    }




    public function view($id){
        $users= DB::table('users')->where('id',$id)->first();
        return view('users.view')
                ->with('educations', $users);

    }
    
    public function edit($id){
        $users= DB::table('users')->where('id',$id)->first();
        $roles   = Role::get();
        return view('educations.edit', compact('users','roles'));

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
