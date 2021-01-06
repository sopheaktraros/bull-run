<?php

Route::get('/', function(){
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    //DASHBOARD
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    //General Setting
    Route::get('general_setting', 'GeneralController@index')->name("general_setting");
    Route::post('general_setting/update', 'GeneralController@update')->name("general_setting.update");

    //Period
    Route::get('period', 'PeriodController@index')->name("period");
    Route::get('period/response', 'PeriodController@response')->name("period.response");
    Route::get('period/create', 'PeriodController@create')->name("period.create");
    Route::post('period/store', 'PeriodController@store')->name("period.store");
    Route::get('period/edit/{id}', 'PeriodController@edit')->name("period.edit");
    Route::post('period/update/{id}', 'PeriodController@update')->name("period.update");
    Route::get('period/delete/{id}', 'PeriodController@destroy')->name("period.delete");

    //Project
    Route::get('project', 'ProjectController@index')->name("project");
    Route::get('project/response', 'ProjectController@response')->name("project.response");
    Route::get('project/create', 'ProjectController@create')->name("project.create");
    Route::post('project/store', 'ProjectController@store')->name("project.store");
    Route::get('project/edit/{id}', 'ProjectController@edit')->name("project.edit");
    Route::post('project/update/{id}', 'ProjectController@update')->name("project.update");
    Route::get('project/delete/{id}', 'ProjectController@destroy')->name("project.delete");

    //House Type
    Route::get('house_types', 'HouseTypeController@index')->name("house_types");
    Route::get('house_types/response', 'HouseTypeController@response')->name("house_types.response");
    Route::get('house_types/create', 'HouseTypeController@create')->name("house_types.create");
    Route::post('house_types/store', 'HouseTypeController@store')->name("house_types.store");
    Route::get('house_types/edit/{id}', 'HouseTypeController@edit')->name("house_types.edit");
    Route::post('house_types/update/{id}', 'HouseTypeController@update')->name("house_types.update");

    //Customer
    Route::get('/customer/table-data', 'CustomerController@getTableData')->name('customer.table');
    Route::get('customer/create', 'CustomerController@create')->name("customer.create");
    Route::post('customer/store', 'CustomerController@store')->name("customer.store");
    Route::get('customer/edit/{id}', 'CustomerController@edit')->name("customer.edit");
    Route::post('customer/update/{id}', 'CustomerController@update')->name("customer.update");
    Route::get('customer/delete/{id}', 'CustomerController@destroy')->name("customer.delete");

    //Roles
    Route::get('roles', 'RolesController@index')->name("roles");
    Route::get('roles/response', 'RolesController@response')->name("roles.response");
    Route::get('roles/create', 'RolesController@create')->name("roles.create");
    Route::post('roles/store', 'RolesController@store')->name("roles.store");
    Route::get('roles/edit/{id}', 'RolesController@edit')->name("roles.edit");
    Route::post('roles/update/{id}', 'RolesController@update')->name("roles.update");
    Route::get('roles/delete/{id}', 'RolesController@destroy')->name("roles.delete");

    //Staff or User
    Route::get('staff', 'StaffController@index')->name("staff");
    Route::get('staff/response', 'StaffController@response')->name("staff.response");
    Route::get('staff/create', 'StaffController@create')->name("staff.create");
    Route::post('staff/store', 'StaffController@store')->name("staff.store");
    Route::get('staff/edit/{id}', 'StaffController@edit')->name("staff.edit");
    Route::post('staff/update/{id}', 'StaffController@update')->name("staff.update");
    Route::get('staff/delete/{id}', 'StaffController@destroy')->name("staff.delete");

    //Permission
    Route::get('permission', 'PermissionController@index')->name("permission");
    Route::get('permission/response/{id}', 'PermissionController@response')->name("permission.response");
    Route::post('permission/update', 'PermissionController@update')->name("permission.update");

});

Auth::routes();



