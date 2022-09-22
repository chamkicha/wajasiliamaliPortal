<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('/');



Route::group(['prefix' => 'login'], function(){
    Route::post('/', 'App\Http\Controllers\Auth\AuthController@login')->name('login');

});

Route::group(['prefix' => 'logout'], function(){
    Route::post('/', 'App\Http\Controllers\Auth\AuthController@logout')->name('logout');

});

Route::group(['prefix' => 'dashboard','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\dashboard\dashboardController@index')->name('dashboard');

});

Route::get('get_district/{region_id?}', [App\Http\Controllers\Region\RegionController::class, 'get_district'])->name('get_district');
Route::get('get_ward/{district_id?}', [App\Http\Controllers\Region\RegionController::class, 'get_ward'])->name('get_ward');
Route::get('get_branch/{ward_id?}', [App\Http\Controllers\Region\RegionController::class, 'get_branch'])->name('get_branch');
Route::get('get_kikundi/{shirikisho_id?}', [App\Http\Controllers\Region\RegionController::class, 'get_kikundi'])->name('get_kikundi');

Route::group(['prefix' => 'users','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\users\usersController@index')->name('users');
    // Route::get('/create', 'MakundiWizara\MakundiWizaraController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\users\usersController@store')->name('users.store');
    // Route::get('/view/{id}','MakundiWizara\MakundiWizaraController@view')->name('view');
    // Route::get('/edit/{id}','MakundiWizara\MakundiWizaraController@edit')->name('edit');
    // Route::post('/update/{id}','MakundiWizara\MakundiWizaraController@update')->name('update');
    // Route::get('/delete/{id}', 'MakundiWizara\MakundiWizaraController@delete')->name('delete');
});


Route::group(['prefix' => 'roles','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\role\roleController@index')->name('roles');
    // Route::get('/create', 'App\Http\Controllers\role\roleController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\role\roleController@store')->name('roles.store');
    // Route::get('/view/{id}','App\Http\Controllers\role\roleController@view')->name('view');
    // Route::get('/edit/{id}','App\Http\Controllers\role\roleController@edit')->name('edit');
    // Route::post('/update/{id}','App\Http\Controllers\role\roleController@update')->name('update');
    // Route::get('/delete/{id}', 'App\Http\Controllers\role\roleController@delete')->name('delete');
});




Route::group(['prefix' => 'permissions','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\Permission\permissionController@index')->name('permissions');
    // Route::get('/create', 'App\Http\Controllers\role\roleController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\Permission\permissionController@store')->name('permissions.store');
    // Route::get('/view/{id}','App\Http\Controllers\role\roleController@view')->name('view');
    // Route::get('/edit/{id}','App\Http\Controllers\role\roleController@edit')->name('edit');
    // Route::post('/update/{id}','App\Http\Controllers\role\roleController@update')->name('update');
    // Route::get('/delete/{id}', 'App\Http\Controllers\role\roleController@delete')->name('delete');
});

Route::group(['prefix' => 'MakundiWizara','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\MakundiWizara\MakundiWizaraController@index')->name('MakundiWizara');
    // Route::get('/create', 'MakundiWizara\MakundiWizaraController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\MakundiWizara\MakundiWizaraController@store')->name('MakundiWizara.store');
    // Route::get('/view/{id}','MakundiWizara\MakundiWizaraController@view')->name('view');
    // Route::get('/edit/{id}','MakundiWizara\MakundiWizaraController@edit')->name('edit');
    // Route::post('/update/{id}','MakundiWizara\MakundiWizaraController@update')->name('update');
    // Route::get('/delete/{id}', 'MakundiWizara\MakundiWizaraController@delete')->name('delete');
});

Route::group(['prefix' => 'Shirikisho','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\Shirikisho\ShirikishoController@index')->name('Shirikisho');
    // Route::get('/create', 'MakundiWizara\MakundiWizaraController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\Shirikisho\ShirikishoController@store')->name('Shirikisho.store');
    // Route::get('/view/{id}','MakundiWizara\MakundiWizaraController@view')->name('view');
    // Route::get('/edit/{id}','MakundiWizara\MakundiWizaraController@edit')->name('edit');
    // Route::post('/update/{id}','MakundiWizara\MakundiWizaraController@update')->name('update');
    // Route::get('/delete/{id}', 'MakundiWizara\MakundiWizaraController@delete')->name('delete');
});

Route::group(['prefix' => 'Vikundi','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\Vikundi\VikundiController@index')->name('Vikundi');
    // Route::get('/create', 'MakundiWizara\MakundiWizaraController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\Vikundi\VikundiController@store')->name('Vikundi.store');
    // Route::get('/view/{id}','MakundiWizara\MakundiWizaraController@view')->name('view');
    // Route::get('/edit/{id}','MakundiWizara\MakundiWizaraController@edit')->name('edit');
    // Route::post('/update/{id}','MakundiWizara\MakundiWizaraController@update')->name('update');
    // Route::get('/delete/{id}', 'MakundiWizara\MakundiWizaraController@delete')->name('delete');
});

Route::group(['prefix' => 'members','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\Members\MembersController@index')->name('members');
    // Route::get('/create', 'MakundiWizara\MakundiWizaraController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\Members\MembersController@store')->name('members.store');
    Route::post('/search', 'App\Http\Controllers\Members\MembersController@search')->name('members.search');
    Route::get('/view/{id}','App\Http\Controllers\Members\MembersController@view')->name('view');
    // Route::get('/edit/{id}','MakundiWizara\MakundiWizaraController@edit')->name('edit');
    // Route::post('/update/{id}','MakundiWizara\MakundiWizaraController@update')->name('update');
    // Route::get('/delete/{id}', 'MakundiWizara\MakundiWizaraController@delete')->name('delete');
});

Route::group(['prefix' => 'BusinessType','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\BusinessType\BusinessTypeController@index')->name('BusinessType');
    // Route::get('/create', 'MakundiWizara\MakundiWizaraController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\BusinessType\BusinessTypeController@store')->name('BusinessType.store');
    // Route::get('/view/{id}','MakundiWizara\MakundiWizaraController@view')->name('view');
    // Route::get('/edit/{id}','MakundiWizara\MakundiWizaraController@edit')->name('edit');
    // Route::post('/update/{id}','MakundiWizara\MakundiWizaraController@update')->name('update');
    Route::get('/delete/{id}', 'App\Http\Controllers\BusinessType\BusinessTypeController@delete')->name('delete');
});

Route::group(['prefix' => 'ranks','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\Ranks\RanksController@index')->name('Ranks');
    // Route::get('/create', 'MakundiWizara\MakundiWizaraController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\Ranks\RanksController@store')->name('Ranks.store');
    // Route::get('/view/{id}','MakundiWizara\MakundiWizaraController@view')->name('view');
    // Route::get('/edit/{id}','MakundiWizara\MakundiWizaraController@edit')->name('edit');
    // Route::post('/update/{id}','MakundiWizara\MakundiWizaraController@update')->name('update');
    // Route::get('/delete/{id}', 'MakundiWizara\MakundiWizaraController@delete')->name('delete');
});

Route::group(['prefix' => 'masoko','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\masoko\masokoController@index')->name('masoko');
    // Route::get('/create', 'MakundiWizara\MakundiWizaraController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\masoko\masokoController@store')->name('masoko.store');
    Route::get('/view/{id}','App\Http\Controllers\masoko\masokoController@view')->name('view');
    // Route::get('/edit/{id}','MakundiWizara\MakundiWizaraController@edit')->name('edit');
    // Route::post('/update/{id}','MakundiWizara\MakundiWizaraController@update')->name('update');
    Route::get('/delete/{id}', 'App\Http\Controllers\masoko\masokoController@delete')->name('delete');
});

Route::group(['prefix' => 'vizimba','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\vizimba\vizimbaController@index')->name('vizimba');
    // Route::get('/create', 'MakundiWizara\MakundiWizaraController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\vizimba\vizimbaController@store')->name('masoko.store');
    // Route::get('/view/{id}','MakundiWizara\MakundiWizaraController@view')->name('view');
    // Route::get('/edit/{id}','MakundiWizara\MakundiWizaraController@edit')->name('edit');
    // Route::post('/update/{id}','MakundiWizara\MakundiWizaraController@update')->name('update');
    Route::get('/delete/{id}', 'App\Http\Controllers\vizimba\vizimbaController@delete')->name('delete');
});

Route::group(['prefix' => 'fees','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\Fees\FeesController@index')->name('fees');
    // Route::get('/create', 'MakundiWizara\MakundiWizaraController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\Fees\FeesController@store')->name('fees.store');
    // Route::get('/view/{id}','MakundiWizara\MakundiWizaraController@view')->name('view');
    // Route::get('/edit/{id}','MakundiWizara\MakundiWizaraController@edit')->name('edit');
    // Route::post('/update/{id}','MakundiWizara\MakundiWizaraController@update')->name('update');
    Route::get('/delete/{id}', 'App\Http\Controllers\Fees\FeesController@delete')->name('delete');
});

Route::group(['prefix' => 'durations','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\FeesDuration\FeesDurationController@index')->name('durations');
    // Route::get('/create', 'MakundiWizara\MakundiWizaraController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\FeesDuration\FeesDurationController@store')->name('durations.store');
    // Route::get('/view/{id}','MakundiWizara\MakundiWizaraController@view')->name('view');
    // Route::get('/edit/{id}','MakundiWizara\MakundiWizaraController@edit')->name('edit');
    // Route::post('/update/{id}','MakundiWizara\MakundiWizaraController@update')->name('update');
    Route::get('/delete/{id}', 'App\Http\Controllers\FeesDuration\FeesDurationController@delete')->name('delete');
});

Route::group(['prefix' => 'applications','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\Applications\ApplicationsController@index')->name('durations');
    // Route::get('/create', 'MakundiWizara\MakundiWizaraController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\Applications\ApplicationsController@store')->name('durations.store');
    // Route::get('/view/{id}','MakundiWizara\MakundiWizaraController@view')->name('view');
    // Route::get('/edit/{id}','MakundiWizara\MakundiWizaraController@edit')->name('edit');
    // Route::post('/update/{id}','MakundiWizara\MakundiWizaraController@update')->name('update');
    Route::get('/delete/{id}', 'App\Http\Controllers\Applications\ApplicationsController@delete')->name('delete');
});

Route::group(['prefix' => 'disabilities','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\disability\disabilityController@index')->name('disabilities');
    // Route::get('/create', 'MakundiWizara\MakundiWizaraController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\disability\disabilityController@store')->name('disabilities.store');
    // Route::get('/view/{id}','MakundiWizara\MakundiWizaraController@view')->name('view');
    // Route::get('/edit/{id}','MakundiWizara\MakundiWizaraController@edit')->name('edit');
    // Route::post('/update/{id}','MakundiWizara\MakundiWizaraController@update')->name('update');
    Route::get('/delete/{id}', 'App\Http\Controllers\disability\disabilityController@delete')->name('delete');
});

Route::group(['prefix' => 'educations','middleware' => 'authUser'], function(){
    Route::get('/', 'App\Http\Controllers\EducationLevel\EducationLevelController@index')->name('educations');
    // Route::get('/create', 'MakundiWizara\MakundiWizaraController@create')->name('create');
    Route::post('/store', 'App\Http\Controllers\EducationLevel\EducationLevelController@store')->name('educations.store');
    // Route::get('/view/{id}','MakundiWizara\MakundiWizaraController@view')->name('view');
    // Route::get('/edit/{id}','MakundiWizara\MakundiWizaraController@edit')->name('edit');
    // Route::post('/update/{id}','MakundiWizara\MakundiWizaraController@update')->name('update');
    Route::get('/delete/{id}', 'App\Http\Controllers\EducationLevel\EducationLevelController@delete')->name('delete');
});

Route::group(['prefix' => 'reports','middleware' => 'authUser'], function(){
    Route::get('/reportWanachama', 'App\Http\Controllers\Reports\ReportsController@reportWanachama')->name('reportWanachama');
    Route::post('/reportWanachamaSearch', 'App\Http\Controllers\Reports\ReportsController@reportWanachamaSearch')->name('reportWanachamaSearch');
    
    Route::get('/reportVikundi', 'App\Http\Controllers\Reports\ReportsController@reportVikundi')->name('reportVikundi');
    Route::post('/reportVikundiSearch', 'App\Http\Controllers\Reports\ReportsController@reportVikundiSearch')->name('reportVikundi.search');
    
    Route::get('/reportShirikisho', 'App\Http\Controllers\Reports\ReportsController@reportShirikisho')->name('reportShirikisho');
    Route::post('/reportShirikishoSearch', 'App\Http\Controllers\Reports\ReportsController@reportShirikishoSearch')->name('reportShirikisho.search');

    Route::get('/mapato', 'App\Http\Controllers\Reports\ReportsController@mapato')->name('mapato');
    Route::get('/mikopo', 'App\Http\Controllers\Reports\ReportsController@mikopo')->name('mikopo');

});