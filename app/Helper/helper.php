<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Request;


function baseUrl(){

    return Config('api.base_url');
}

function permissions()
{
    $permissions = json_decode(Request::cookie('perm'));

    // $perm = [];
    // foreach($permissions as $permission){
    //     $perm[] = $permission;

    // }
    return $permissions;
}

function token()
{
    return Request::cookie('token');
}

function fullname()
{
    return Request::cookie('name');
}

function email()
{
    return Request::cookie('email');
}

function user_id()
{
    return Request::cookie('user_id');
}