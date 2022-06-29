<?php
Route::redirect('/', 'admin/home');

Auth::routes(['register' => false]);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Auth::routes();
// Change Password Routes...
Route::get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
Route::patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');
Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');
    Route::resource('roles', 'Admin\RolesController');
    Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');
    Route::resource('users', 'Admin\UsersController');
    Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
    
    //Event Route
    Route::resource('events', 'EventController');
    //Participant Type Route
    Route::resource('participant_type', 'ParticipantTypeController');
    //Places Route
    Route::resource('places', 'PlaceController');
    //Places Route
    Route::resource('organizations', 'OrganizationController');
    //Stundents Route
    Route::resource('students', 'StudentController');
    //Employees Route
    Route::resource('employees', 'EmployeeController');
     //Proposal Route
     Route::resource('proposals', 'ProposalController');
});
