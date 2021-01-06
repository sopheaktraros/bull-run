<?php

Route::get('/', function(){
    return view('admin.auth.login');
});

Route::middleware('auth')->group(function () {
    //DASHBOARD
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    //Package
    Route::get('package', 'PackageController@index')->name("package");
    Route::get('package/response', 'PackageController@response')->name("package.response");
    Route::get('package/create', 'PackageController@create')->name("package.create");
    Route::post('package/store', 'PackageController@store')->name("package.store");
    Route::get('package/edit/{id}', 'PackageController@edit')->name("package.edit");
    Route::post('package/update/{id}', 'PackageController@update')->name("package.update");
    Route::get('package/delete/{id}', 'PackageController@destroy')->name("package.delete");

    //PackagePermission
    Route::get('package_permission', 'PackagePermissionController@index')->name("package_permission");
    Route::get('package_permission/response/{id}', 'PackagePermissionController@response')->name("package_permission.response");
    Route::post('package_permission/update', 'PackagePermissionController@update')->name("package_permission.update");

    //Subscriber
    Route::get('subscriber', 'SubscriberController@index')->name("subscriber");
    Route::get('subscriber/response', 'SubscriberController@response')->name("subscriber.response");
    Route::get('subscriber/create', 'SubscriberController@create')->name("subscriber.create");
    Route::post('subscriber/store', 'SubscriberController@store')->name("subscriber.store");
    Route::get('subscriber/edit/{id}', 'SubscriberController@edit')->name("subscriber.edit");
    Route::post('subscriber/update/{id}', 'SubscriberController@update')->name("subscriber.update");
    Route::get('subscriber/delete/{id}', 'SubscriberController@destroy')->name("subscriber.delete");

    //Subscription
    Route::get('subscription', 'SubscriptionController@index')->name("subscription");
    Route::get('subscription/response', 'SubscriptionController@response')->name("subscription.response");
    Route::get('subscription/create', 'SubscriptionController@create')->name("subscription.create");
    Route::post('subscription/store', 'SubscriptionController@store')->name("subscription.store");
    Route::get('subscription/edit/{id}', 'SubscriptionController@edit')->name("subscription.edit");
    Route::post('subscription/update/{id}', 'SubscriptionController@update')->name("subscription.update");
    Route::get('subscription/delete/{id}', 'SubscriptionController@destroy')->name("subscription.delete");

    Route::get('report_subscriber', 'ReportSubscriberController@index')->name("report_subscriber");
    Route::get('report_subscriber/response', 'ReportSubscriberController@response')->name("report_subscriber.response");
    Route::get('report_subscriber/responseSearch', 'ReportSubscriberController@responseSearch')->name("report_subscriber.responseSearch");
    Route::get('report_subscriber/history/{id}', 'ReportSubscriberController@history')->name("report_subscriber.history");
    Route::get('report_subscriber/responseHistory/{id}', 'ReportSubscriberController@responseHistory')->name("report_subscriber.responseHistory");
    Route::get('report_subscriber/responseSearchHistory', 'ReportSubscriberController@responseSearchHistory')->name("report_subscriber.responseSearchHistory");

    Route::get('report_ar', 'ReportSubscriberController@index')->name("report_ar");

    Route::get('report_monthly_income', 'ReportMonthlyIncomeController@index')->name("report_monthly_income");

    
    //General Setting
    Route::get('general_setting', 'GeneralController@index')->name("general_setting");
    Route::post('general_setting/update/{id}', 'GeneralController@update')->name("general_setting.update");

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

    //Profile
    Route::get('profile', 'ProfileController@index')->name("profile");
    Route::post('profile/update/{id}', 'ProfileController@update');
});

Auth::routes();



