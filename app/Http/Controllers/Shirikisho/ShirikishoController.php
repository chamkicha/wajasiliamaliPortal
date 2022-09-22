<?php

namespace App\Http\Controllers\Shirikisho;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ShirikishoController extends Controller
{
    public function index()
    {
        
        $URL  = baseUrl().'/list-shirikisho';
      
        
        try{
        $shirikishos  =  Http::withToken(token())->get($URL)->json();
        if ($shirikishos['error']=='true')
        {
            Session::flash('alert-warning',''.$shirikishos['message']);
            $shirikishos =  ['data'=>array()];
        }
        $shirikishos  =  $shirikishos['data'];

        $category_URL  = baseUrl().'/list-category';
        $categories  =  Http::withToken(token())->get($category_URL)->json();
        if ($categories['error']=='true')
        {
            Session::flash('alert-warning',''.$categories['message']);
            $categories =  ['data'=>array()];
        }
        $categories  =  $categories['data'];

        $tittle = 'Orodha ya Mashirikisho';

        return view('Shirikisho.index', compact('shirikishos','categories','tittle'));
        } catch (\Throwable $exception){

            Log::error('Shirikisho-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('Shirikisho')->withInput();
        }


    }


    public  function  create(){

        return view('Shirikisho.create');

    }

    public  function  store(Request $request){
        $URL  = baseUrl().'/register-shirikisho';
        
        
        try{
            $result  =  Http::withToken(token())->post($URL,
                [
                    'name'=>$request->name,
                    'category_id'=> $request->category_id
                ]
            );
            $result = json_decode($result);

            $class  =  'success';
            if (!$result->statusCode == 300){
                Session::flash('alert-danger',' '.$result->message);
                return redirect('Shirikisho')->withInput();
            }

            Session::flash('alert-'.$class,' '.$result->message);
            return redirect('Shirikisho');
        } catch (\Throwable $exception){

            Log::error('Shirikisho-ERROR',['MESSAGE'=>$exception]);

            Session::flash('alert-danger',' Server error ');

            return redirect('Shirikisho')->withInput();
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
