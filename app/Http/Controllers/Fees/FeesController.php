<?php

namespace App\Http\Controllers\Fees;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class FeesController extends Controller
{
    public function index()
    {

        $URL  = baseUrl().'/list-fee';
       
        try{
        
        $fees  =  Http::withToken(token())->get($URL)->json();
        if ($fees['error']=='true')
        {
            Session::flash('alert-warning',''.$fees['message']);
            $fees =  ['data'=>array()];
        }
        $fees  =  $fees['data'];

        $regions_URL  = baseUrl().'/regions';
        $regions  =  Http::withToken(token())->get($regions_URL)->json();
        if ($regions['error']=='true')
        {
            Session::flash('alert-warning',''.$regions['message']);
            $regions =  ['data'=>array()];
        }
        $regions  =  $regions['data'];

        $duration_URL  = baseUrl().'/list-fee-duration';
        $duration  =  Http::withToken(token())->get($duration_URL)->json();
        if ($duration['error']=='true')
        {
            Session::flash('alert-warning',''.$duration['message']);
            $duration =  ['data'=>array()];
        }
        $durations  =  $duration['data'];

      

        $tittle = 'Orodha ya Masoko';
        return view('fees.index', compact('fees','tittle','regions','durations'));

        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('fees')->withInput();
        }

    }


    public  function  create(){

        return view('fees.create');

    }

    public  function  store(Request $request){

        // dd($request);
        $URL  = baseUrl().'/register-fee';
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'name'=>$request->name,
                    'price'=>$request->price,
                    'durationId'=>$request->durationId,
                    'feetypeId'=>$request->code,
                ]
            );
            $result = json_decode($result);
            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('fees')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('fees');
        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('fees')->withInput();
        }

    }

    public function delete($id){
        $URL  = baseUrl().'/delete-fee';
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'feeId'=>$id,
                ]
            );
            $result = json_decode($result);

            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('fees')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('fees');
        }catch (\Throwable $exception){

            Log::error('BUSINESS TYPE-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('fees')->withInput();
        }
    }




    public function view($id){
        $fees= DB::table('fees')->where('id',$id)->first();
        return view('fees.view')
                ->with('fees', $fees);

    }
    
    public function edit($id){
        $fees= DB::table('fees')->where('id',$id)->first();
        $roles   = Role::get();
        return view('fees.edit', compact('fees','roles'));

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
