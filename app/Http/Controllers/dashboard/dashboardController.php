<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Cookie;
use Illuminate\Support\Facades\Log;

class dashboardController extends Controller
{
    public function index(){
        try{
            
        $member_URL  = baseUrl().'/list-members';
        $members  =  Http::withToken(token())->get($member_URL);
        $members = json_decode($members);
    //    dd(permissions());

        if (!$members->statusCode==300)
        {
            Session::flash('alert-warning',''.$members->message);
            $members =  '';
        }
        $members = count($members->data);

        
        $shirikisho_URL  = baseUrl().'/list-shirikisho';
      
        
        $shirikishos  =  Http::withToken(token())->get($shirikisho_URL);
        $shirikishos = json_decode($shirikishos);
        if (!$shirikishos->statusCode==300)
        {
            Session::flash('alert-warning',''.$shirikishos->message);
            $shirikishos =  '';
        }
        $shirikishos = count($shirikishos->data);
        
        
        $groups_URL  = baseUrl().'/list-groups';
        $groups  =  Http::withToken(token())->get($groups_URL);
        $groups = json_decode($groups);
        if (!$groups->statusCode==300)
        {
            Session::flash('alert-warning',''.$groups->message);
            $groups =  '';
        }
        $groups = count($groups->data);

        

        $masoko_URL  = baseUrl().'/list-masoko';
        $masoko  =  Http::withToken(token())->get($masoko_URL);
        $masoko = json_decode($masoko);
        if (!$masoko->statusCode==300)
        {
            Session::flash('alert-warning',''.$masoko->message);
            $masoko =  '';
        }
        $masoko = count($masoko->data);

        $tittle = 'Dashboard';
        return view('dashboard',compact('members','shirikishos','groups','masoko','tittle'));
            
    } catch (\Exception $exception){

        return redirect('dashboard')->withInput();
    }

    }
}
