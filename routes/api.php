<?php

use App\Models\Clients;
use App\Models\Fees;
use App\Models\Plots;
use App\Models\Portfolio;
use App\Models\Task;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/clients', function(){
    return Clients::all();

});

Route::get('/plots', function(){
    return Plots::all();

});

Route::get('/fees', function(){
    return Fees::all();

});

Route::get('/portfolios', function(){
    return Portfolio::all();

});

Route::get('/tasks', function(){
    return Task::all();

});