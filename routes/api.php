<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/


Route::get('/user/details/{id}', function ($id) {
    $user= DB::table('users')->where('id', $id)->get();
    $count=count($user);
    if($count<1){
        $array = array(
            'status' => 200,
            'message' => 'No Record Found'
        );
        $res=json_encode($array, JSON_PRETTY_PRINT);
    }elseif ($count>0){
        $array = array(
            'status' => 200,
            'user' => $user->toArray()
        );
        $res=json_encode($array, JSON_PRETTY_PRINT);
    }else{
        $array = array(
            'status' => 200,
            'user' => 'Sorry! No Resource Found Matching the URL'
        );
        $res=json_encode($array, JSON_PRETTY_PRINT);
    }
    return response($res)->header('Content-Type', 'application/json; charset=utf-8');
});

Route::get('res/test','SuperAdminController@showTest');
