<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class ReportsController extends Controller
{
    public function reportWanachama()
    {
        $URL  = baseUrl().'/list-members';
       
        
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
        $request = null;

        return view('reports.reportWanachama', compact('members','regions','shirikishos','tittle','counts','countFemale','countMale','request'));
    }


    public function reportWanachamaSearch(Request $request){

        if($request->region && is_null($request->district)){

         try{
            $URL  = baseUrl().'/member-report-region';
            $members  =  Http::withToken(token())->post($URL,
                [
                    'regionCode'=>$request->region,
                ]
            )->json();        
          }catch (\Throwable $exception){

                Log::error('MAKUNDI WIZARA-ERROR',['MESSAGE'=>$exception]);
    
                Session::flash('alert-danger',' Server error ');
    
                return redirect('members')->withInput();
            }

        }
        elseif($request->region && $request->district && is_null($request->ward)){
         try{
            $URL  = baseUrl().'/member-report-district';
            $members  =  Http::withToken(token())->post($URL,
                [
                    'districtCode'=>$request->district,
                ]
            )->json();       
        }catch (\Throwable $exception){

              Log::error('MAKUNDI WIZARA-ERROR',['MESSAGE'=>$exception]);
  
              Session::flash('alert-danger',' Server error ');
  
              return redirect('members')->withInput();
          }

        }
        elseif($request->region && $request->district && $request->ward){
         try{
            $URL  = baseUrl().'/member-report-ward';
            $members  =  Http::withToken(token())->post($URL,
                [
                    'wardCode'=>$request->ward,
                ]
            )->json();       
        }catch (\Throwable $exception){

              Log::error('MAKUNDI WIZARA-ERROR',['MESSAGE'=>$exception]);
  
              Session::flash('alert-danger',' Server error ');
  
              return redirect('members')->withInput();
          }

        }
        elseif($request->shirikishoId && is_null($request->kikundiCode)){
         
            try{
                $URL  = baseUrl().'/member-report-shirikisho';
                $members  =  Http::withToken(token())->post($URL,
                    [
                        'shirikishoCode'=>$request->shirikishoId,
                    ]
                )->json();
            }catch (\Throwable $exception){
    
                  Log::error('MAKUNDI WIZARA-ERROR',['MESSAGE'=>$exception]);
      
                  Session::flash('alert-danger',' Server error ');
      
                  return redirect('members')->withInput();
              }

        }
        elseif($request->shirikishoId && $request->kikundiCode){
         
            try{
                $URL  = baseUrl().'/member-report-kikundi';
                $members  =  Http::withToken(token())->post($URL,
                    [
                        'kikundiCode'=>$request->kikundiCode,
                    ]
                )->json();
            }catch (\Throwable $exception){
    
                  Log::error('MAKUNDI WIZARA-ERROR',['MESSAGE'=>$exception]);
      
                  Session::flash('alert-danger',' Server error ');
      
                  return redirect('members')->withInput();
              }

        }
        elseif($request->sex){
         
            try{
                $URL  = baseUrl().'/member-report-gender';
                $members  =  Http::withToken(token())->post($URL,
                    [
                        'genderCode'=>$request->sex,
                    ]
                )->json();
            }catch (\Throwable $exception){
    
                  Log::error('MAKUNDI WIZARA-ERROR',['MESSAGE'=>$exception]);
      
                  Session::flash('alert-danger',' Server error ');
      
                  return redirect('members')->withInput();
              }

        }
        else{
            return redirect('reportWanachama');

        }
        

        $class  =  'success';
        if ($members['statusCode']!==300){
            Session::flash('alert-danger',' '.$result['message']);
            return redirect('reportWanachama')->withInput();
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

        return view('reports.reportWanachama', compact('members','regions','shirikishos','tittle','counts','countFemale','countMale','request'));


        


    }

    public function reportVikundi(){
        $URL  = baseUrl().'/list-groups';
        $groups  =  Http::withToken(token())->get($URL)->json();
        if ($groups['error']=='true')
        {
            Session::flash('alert-warning',''.$groups['message']);
            $groups =  ['data'=>array()];
        }
        $groups  =  $groups['data'];

        $shirikisho_URL  = baseUrl().'/list-shirikisho';
        $shirikishos  =  Http::withToken(token())->get($shirikisho_URL)->json();
        if ($shirikishos['error']=='true')
        {
            Session::flash('alert-warning',''.$shirikishos['message']);
            $shirikishos =  ['data'=>array()];
        }
        $shirikishos  =  $shirikishos['data'];

        $regions_URL  = baseUrl().'/regions';
        $regions  =  Http::withToken(token())->get($regions_URL)->json();
        if ($regions['error']=='true')
        {
            Session::flash('alert-warning',''.$regions['message']);
            $regions =  ['data'=>array()];
        }
        $regions  =  $regions['data'];
        $tittle = 'Orodha ya Vikundi';
        return view('reports.reportVikundi', compact('groups','shirikishos','regions','tittle'));
    }

    public function mapato(){
        $URL  = baseUrl().'/list-members';
       
        
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
        $request = null;

        return view('reports.reportMapato', compact('members','regions','shirikishos','tittle','counts','countFemale','countMale','request'));
   

    }

    public function mikopo(){
        $URL  = baseUrl().'/list-members';
       
        
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
        $request = null;

        return view('reports.reportMikopo', compact('members','regions','shirikishos','tittle','counts','countFemale','countMale','request'));
   
        
    }
}
