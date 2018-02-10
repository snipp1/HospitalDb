<?php

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

// auth users routes
Route::group(['middleware' => 'guest'], function () {

    Route::get('/', [
        'uses' => 'LoginController@index',
        'as' => 'login']);
    Route::post('/', [
        'uses' => 'LoginController@login',
        'as' => 'login.store']);


    Route::post('/logout/all', [
        'uses' => 'LoginController@logout_all',
        'as' => 'logout_all']);
});

// auth users routes
Route::group(['middleware' => 'auth'], function () {
//    users route for super and admin
    Route::group(['prefix' => 'users'], function () {
//individual routes
        Route::get('/', ['uses' => 'UsersController@index', 'as' => 'users.index']);
        Route::post('/show', ['uses' => 'UsersController@show', 'as' => 'users.show']);
        Route::get('/create', ['uses' => 'UsersController@create', 'as' => 'users.create']);
        Route::post('/store', ['uses' => 'UsersController@store', 'as' => 'users.store']);
        Route::get('/edit/{users}', ['uses' => 'UsersController@edit', 'as' => 'users.edit']);
        Route::post('/update/{user}', ['uses' => 'UsersController@update', 'as' => 'users.update']);
        Route::get('/delete/{users}', ['uses' => 'UsersController@delete', 'as' => 'users.delete']);
    });
//        role route for super admin
    Route::group(['prefix' => 'role'], function () {
//individual routes
        Route::get('/', ['middleware' => ['permission:see_roles'],'uses' => 'RoleController@index', 'as' => 'role.index']);
        Route::post('/show', ['uses' => 'RoleController@show', 'as' => 'role.show']);
        Route::get('/create', ['uses' => 'RoleController@create', 'as' => 'role.create']);
        Route::post('/store', ['uses' => 'RoleController@store', 'as' => 'role.store']);
        Route::get('/edit/{role}', ['uses' => 'RoleController@edit', 'as' => 'role.edit']);
        Route::post('/update/{role}', ['uses' => 'RoleController@update', 'as' => 'role.update']);
        Route::get('/delete/{role}', ['uses' => 'RoleController@destroy', 'as' => 'role.delete']);
    });
//    permission route for super and admin
    Route::group(['prefix' => 'permission', 'middleware' => ['role:developer']], function () {
//individual routes
        Route::get('/', ['middleware' => ['permission:see_permission'],'uses' => 'PermissionController@index', 'as' => 'permission.index']);
        Route::post('/show', ['uses' => 'PermissionController@show', 'as' => 'permission.show']);
        Route::get('/create', ['uses' => 'PermissionController@create', 'as' => 'permission.create']);
        Route::post('/store', ['uses' => 'PermissionController@store', 'as' => 'permission.store']);
        Route::get('/edit/{permission}', ['uses' => 'PermissionController@edit', 'as' => 'permission.edit']);
        Route::post('/update/{permission}', ['uses' => 'PermissionController@update', 'as' => 'permission.update']);
        Route::get('/delete/{permission}', ['uses' => 'PermissionController@destroy', 'as' => 'permission.delete']);
    });
//    hospital route for super and admin
    Route::group(['prefix' => 'hospital'], function () {
//individual routes
        Route::get('/', ['middleware' => ['permission:see_hospital'],'uses' => 'HospitalController@index', 'as' => 'hospital.index']);
        Route::post('/show', ['uses' => 'HospitalController@show', 'as' => 'hospital.show']);
        Route::get('/create', ['uses' => 'HospitalController@create', 'as' => 'hospital.create']);
        Route::post('/store', ['uses' => 'HospitalController@store', 'as' => 'hospital.store']);
        Route::get('/edit/{hospital}', ['uses' => 'HospitalController@edit', 'as' => 'hospital.edit']);
        Route::post('/update/{hospital}', ['uses' => 'HospitalController@update', 'as' => 'hospital.update']);
        Route::get('/delete/{hospital}', ['uses' => 'HospitalController@destroy', 'as' => 'hospital.delete']);
        Route::get('/lock/{hospital}', ['uses' => 'HospitalController@lock', 'as' => 'hospital.lock']);
        Route::get('/view/{hospital?}', ['middleware' => ['permission:see_hospital_profile'],'uses' => 'HospitalController@view', 'as' => 'hospital.view']);
    });
//    department route for super and admin
    Route::group(['prefix' => 'department'], function () {
//individual routes
        Route::get('/', ['middleware' => ['permission:see_department'],'uses' => 'DepartmentController@index', 'as' => 'department.index']);
        Route::post('/show', ['uses' => 'DepartmentController@show', 'as' => 'department.show']);
        Route::get('/create', ['uses' => 'DepartmentController@create', 'as' => 'department.create']);
        Route::post('/store', ['uses' => 'DepartmentController@store', 'as' => 'department.store']);
        Route::get('/edit/{department}', ['uses' => 'DepartmentController@edit', 'as' => 'department.edit']);
        Route::post('/update/{department}', ['uses' => 'DepartmentController@update', 'as' => 'department.update']);
        Route::get('/delete/{department}', ['uses' => 'DepartmentController@destroy', 'as' => 'department.delete']);
    });
//    Patient route for super and admin
    Route::group(['prefix' => 'patient'], function () {
//individual routes
        Route::get('/', ['middleware' => ['permission:see_patient'],'uses' => 'PatientController@index', 'as' => 'patient.index']);
        Route::post('/show', ['middleware' => ['permission:see_patient'],'uses' => 'PatientController@show', 'as' => 'patient.show']);
        Route::get('/create', ['uses' => 'PatientController@create', 'as' => 'patient.create']);
        Route::post('/store', ['uses' => 'PatientController@store', 'as' => 'patient.store']);
        Route::get('/edit/{patient}', ['uses' => 'PatientController@edit', 'as' => 'patient.edit']);
        Route::post('/update/{patient}', ['uses' => 'PatientController@update', 'as' => 'patient.update']);
        Route::get('/delete/{patient}', ['uses' => 'PatientController@delete', 'as' => 'patient.delete']);
    });
    Route::get('/logout', [
        'uses' => 'LoginController@logout',
        'as' => 'logout']);
});