<?php

namespace App\Http\Controllers\disability;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class disabilityController extends Controller
{
    public function index()
    {

        $URL  = baseUrl().'/disability';
       
        
        try{
            $disabilities  =  Http::withToken(token())->get($URL)->json();
        if ($disabilities['error']=='true')
        {
            Session::flash('alert-warning',''.$disabilities['message']);
            $disabilities =  ['data'=>array()];
        }
        $disabilities  =  $disabilities['data'];
        $tittle = 'Orodha Hali za Mwanachama';
        return view('disabilities.index', compact('disabilities','tittle'));
        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('disabilities')->withInput();
        }

    }


    public  function  create(){

        return view('disabilities.create');

    }

    public  function  store(Request $request){

        $URL  = baseUrl().'/register-disability';
        
        
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
                return redirect('disabilities')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('disabilities');
        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('disabilities')->withInput();
        }

    }

    public function delete($id){
        $URL  = baseUrl().'/delete-disability';
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'disabilityId'=>$id,
                ]
            );
            $result = json_decode($result);

            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('disabilities')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('disabilities');
        }catch (\Throwable $exception){

            Log::error('BUSINESS TYPE-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('disabilities')->withInput();
        }
    }




    public function view($id){
        $disabilities= DB::table('users')->where('id',$id)->first();
        return view('disabilities.view')
                ->with('disabilities', $users);

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
