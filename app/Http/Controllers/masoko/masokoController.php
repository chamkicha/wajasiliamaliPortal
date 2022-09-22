<?php

namespace App\Http\Controllers\masoko;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class masokoController extends Controller
{
    public function index()
    {

        $URL  = baseUrl().'/list-masoko';
       
        try{
        
        $masoko  =  Http::withToken(token())->get($URL)->json();
        if ($masoko['error']=='true')
        {
            Session::flash('alert-warning',''.$masoko['message']);
            $masoko =  ['data'=>array()];
        }
        $masoko  =  $masoko['data'];

        $regions_URL  = baseUrl().'/regions';
        $regions  =  Http::withToken(token())->get($regions_URL)->json();
        if ($regions['error']=='true')
        {
            Session::flash('alert-warning',''.$regions['message']);
            $regions =  ['data'=>array()];
        }
        $regions  =  $regions['data'];

        $tittle = 'Orodha ya Masoko';
        return view('masoko.index', compact('masoko','tittle','regions'));

        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('masoko')->withInput();
        }

    }


    public  function  create(){

        return view('members.create');

    }

    public  function  store(Request $request){
        $URL  = baseUrl().'/register-masoko';
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'name'=>$request->name,
                    'wardId'=>$request->ward,
                    'sokoType'=>$request->sokoType,
                ]
            );
            $result = json_decode($result);
            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('masoko')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('masoko');
        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('masoko')->withInput();
        }

    }

    public function delete($id){
        $URL  = baseUrl().'/delete-soko';
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'sokoId'=>$id,
                ]
            );
            $result = json_decode($result);

            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('masoko')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('masoko');
        }catch (\Throwable $exception){

            Log::error('BUSINESS TYPE-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('masoko')->withInput();
        }
    }




    public function view($id){

        $URL  = baseUrl().'/masoko-details/'.$id;
       
        try{
        
        $masoko  =  Http::withToken(token())->get($URL)->json();
        if ($masoko['error']=='true')
        {
            Session::flash('alert-warning',''.$masoko['message']);
            $masoko =  ['data'=>array()];
        }
        $masoko  =  $masoko['data'];
        // dd($masoko['sokoId']);

        $kizimba_URL  = baseUrl().'/soko-kizimba';
        $kizimba  =  Http::withToken(token())->post($kizimba_URL,['sokoId'=>$id,])->json();

        if ($kizimba['error']=='true')
        {
            Session::flash('alert-warning',''.$kizimba['message']);
            $kizimba =  ['data'=>array()];
        }
        $kizimbas  =  $kizimba['data'];

        $tittle = 'Orodha ya Masoko';
        return view('masoko.view', compact('masoko','tittle','kizimbas'));

        } catch (\Throwable $exception){

            Log::error('RANKS-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('masoko')->withInput();
        }

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
