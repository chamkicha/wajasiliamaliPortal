<?php

namespace App\Http\Controllers\Region;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegionController extends Controller
{
    
    public function get_district($region_id){
        

        $districts_URL  = baseUrl().'/districts';
        
        $districts  =  Http::withToken(token())->post($districts_URL,
                    [
                        'regionCode'=>$region_id
                    ]);

        $districts = json_decode($districts);

        if (!$districts->statusCode == 300){
            Session::flash('alert-danger',' '.$districts->message);
            return redirect('Vikundi')->withInput();
        }

        return response()->json($districts->data);
        
    }

    public function get_ward($district_id){
        

        $wards_URL  = baseUrl().'/wards';
        
        $wards  =  Http::withToken(token())->post($wards_URL,
                    [
                        'districtCode'=>$district_id
                    ]);

        $wards = json_decode($wards);

        if (!$wards->statusCode == 300){
            Session::flash('alert-danger',' '.$wards->message);
            return redirect('Vikundi')->withInput();
        }

        return response()->json($wards->data);
        
    }

    public function get_kikundi($shirikisho_id){
        

        $shirikisho_id_URL  = baseUrl().'/kikundi-report-shirikisho';
        
        $kikundi  =  Http::withToken(token())->post($shirikisho_id_URL,
                    [
                        'shirikishoCode'=>$shirikisho_id
                    ]);

        $kikundi = json_decode($kikundi);
        if (!$kikundi->statusCode == 300){
            Session::flash('alert-danger',' '.$kikundi->message);
            return redirect('Vikundi')->withInput();
        }

        return response()->json($kikundi->data);
        
    }


}
