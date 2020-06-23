<?php

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

Route::middleware([ 'auth:sanctum','isAdmin'])->group(function () {


    
    //list trash
    Route::get('/users/trash', 'UserController@trash');
    //restore deleted user
    Route::get('/user/trash/{id}', 'UserController@restore');
    // create one user
    Route::post('/user', 'UserController@store');
    // list single user
    // Route::get('/user/{user}', 'UserController@show');
    // edit user
    Route::put('/user/{user}', 'UserController@update');
    //delete user
    Route::delete('/user/{user}', 'UserController@destroy');
    //list roles
    Route::get('/roles', 'RoleController@index');
    // create one role
    Route::post('/role', 'RoleController@store');
    // list single role
    Route::get('/role/{role}', 'RoleController@show');
    // edit role
    Route::put('/role/{role}', 'RoleController@update');
    //delete role

    Route::post('/evaluation_cycle', 'Evaluation_CycleController@store');
    
    Route::put('/evaluation_cycle/{id}', 'Evaluation_CycleController@update');

    Route::delete('/evaluation_cycle/{id}', 'Evaluation_CycleController@destroy');

    Route::get('/criterias', 'CriteriaController@index');

    Route::get('/criterias/trash', 'CriteriaController@trash');

    Route::get('/criteria/trash/{id}', 'CriteriaController@restore');

    Route::post('/criteria', 'CriteriaController@store');

    Route::get('/criteria/{id}', 'CriteriaController@show');

    Route::put('/criteria/{id}', 'CriteriaController@update');

    Route::delete('/criteria/{id}', 'CriteriaController@destroy');

    // indicators

    Route::get('/indicators', 'IndicatorController@index');

    Route::get('/indicators/trash', 'IndicatorController@trash');

    Route::get('/indicator/trash/{id}', 'IndicatorController@restore');

    // Route::post('/indicator', 'IndicatorController@store');

    Route::get('/indicator/{id}', 'IndicatorController@show');

    Route::put('/indicator/{id}', 'IndicatorController@update');

    Route::delete('/indicator/{id}', 'IndicatorController@destroy');

    //Groups
    Route::get('/groups', 'GroupController@index');
    Route::post('/group', 'GroupController@store');


    Route::get('/evaluation/{id}', 'User_IndicatorController@getUserIndicators');

});
// Route::post('/group', 'GroupController@store');

// Route::get('/groups', 'GroupController@index');

Route::post('/sanctum/token', 'GenerateTaken');

Route::middleware(['auth:sanctum'])->group(function () {

      //list users
      Route::get('/users', 'UserController@index');

      Route::get('/user/{user}', 'UserController@show');

      Route::get('/criteriatypes','Criteria_TypeContoller@index');

      Route::get('/evaluation_cycles', 'Evaluation_CycleController@index');

      Route::get('/evaluation_cycle/{id}', 'Evaluation_CycleController@show');

      Route::get('/evaluation/{userId}/{cycleId}', 'EvaluationController@getEvaluation');

      Route::post('/evaluation', 'EvaluationController@store');

    //   Route::get('/users/{role}', 'UserController@getUsers');

      Route::get('/criteria/role/{id}/{rid}', 'CriteriaController@getByRole');
     
      Route::get('/evaluation_cycles', 'Evaluation_CycleController@index');

      Route::post('/evaluation', 'EvaluationController@store'); 

});

Route::get('/users/{role}', 'UserController@getUsers');

// user_indicators middleware
// Route::post('/evaluations', 'User_IndicatorController@create');
//list indicators for specific user
// Route::get('/evaluation/{id}', 'User_IndicatorController@getUserIndicators');
