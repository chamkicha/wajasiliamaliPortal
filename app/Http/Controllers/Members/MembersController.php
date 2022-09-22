<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class MembersController extends Controller
{
    public function index()
    {

        $URL  = baseUrl().'/list-members';
       
        try{
        
        $members  =  Http::withToken(token())->get($URL)->json();
        if ($members['error']=='true')
        {
            Session::flash('alert-warning',''.$members['message']);
            $members =  ['data'=>array()];
        }
        $counts  =  $members['counts'];
        $countFemale  =  $members['countFemale'];
        $countMale  =  $members['countMale'];
        $members  =  $members['data'];
        

        $regions_URL  = baseUrl().'/regions';
        $regions  =  Http::withToken(token())->get($regions_URL)->json();
        if ($regions['error']=='true')
        {
            Session::flash('alert-warning',''.$regions['message']);
            $regions =  ['data'=>array()];
        }
        $regions  =  $regions['data'];

        

        $shirikisho_URL  = baseUrl().'/list-shirikisho';
        $shirikishos  =  Http::withToken(token())->get($shirikisho_URL)->json();
        if ($shirikishos['error']=='true')
        {
            Session::flash('alert-warning',''.$shirikishos['message']);
            $shirikishos =  ['data'=>array()];
        }
        $shirikishos  =  $shirikishos['data'];
        $tittle = 'Orodha ya Wanachama';
        return view('members.index', compact('members','regions','shirikishos','tittle','counts','countFemale','countMale'));
        
        }catch (\Throwable $exception){

            Log::error('MAKUNDI WIZARA-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('members')->withInput();
        }

    }


    public  function  search(Request $request){
        return redirect('members');

    }

    public  function  store(Request $request){

        $URL  = baseUrl().'/register-members';
        
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'name'=>$request->name,
                ]
            );

            $class  =  'success';
            if ($result['resultcode']!='0'){
                Session::flash('alert-danger',' '.$result['message']);
                return redirect('members')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result['message']);
            return redirect('members');
        }catch (\Throwable $exception){

            Log::error('MAKUNDI WIZARA-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('members')->withInput();
        }

    }


    public function view($id){

        $URL  = baseUrl().'/member-details/'.$id;
       
        try{
        
        $members  =  Http::withToken(token())->get($URL);
        $members = json_decode($members);
        if (!$members->statusCode==300)
        {
            Session::flash('alert-warning',''.$members->message);
            $members =  '';
        }
        $members  =  $members->data;
        dd($members);
        // $tittle = 'Orodha ya Wanachama';
        return view('members.view', compact('members'));
    }catch (\Throwable $exception){

        Log::error('MAKUNDI WIZARA-ERROR',['MESSAGE'=>$exception]);

        Session::flash('alert-danger',' Server error ');

        return redirect('members')->withInput();
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
    

    public function delete($id){
        $delete = User::destroy($id);

        Session::flash('error', 'Successfully Delete User');
        
        return redirect(route('users'));
    }

}
