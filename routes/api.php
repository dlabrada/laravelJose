<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/user', function (Request $request) {
    
    $chipid = $request->input('chipid');
    $temperatura = $request->input('temperatura');
    DB::insert('insert into tabla (chipid,temperatura) values (?, ?)', [$chipid,$temperatura]);
    $users = DB::select('select * from tabla');
    return response($users, 200)
    ->header('Content-Type', 'text/json');
});
