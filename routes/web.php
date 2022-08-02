<?php

use App\Http\Controllers\ProposalController;

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
    Route::resource('revisions', 'RevisionController');
    Route::post('/proposals/store_proposal', 'ProposalController@store_proposal')->name('store.proposal');
    Route::get('/proposals/finalize/{proposal}', 'ProposalController@finalize')->name('proposals.finalize');

    //Committe Route
    Route::get('/proposals/destroy_committee/{proposal}', 'ProposalController@destroy_committee')->name('committee.destroy');
    Route::post('/proposals/update_committee/{proposal}', 'ProposalController@update_committee')->name('committee.update');
    Route::post('/proposals/store_committee', 'ProposalController@store_committee')->name('committee.store');
    //Budget Receipt Route
    Route::post('/proposals/store_budgetreceipt', 'ProposalController@store_budget_receipt')->name('budgetreceipt.store');
    Route::post('/proposals/store_budgetreceipt/{proposal}', 'ProposalController@update_budgetreceipt')->name('budgetreceipt.update');
    Route::get('/proposals/destroy_budgetreceipt/{proposal}', 'ProposalController@destroy_budgetreceipt')->name('budgetreceipt.destroy');
    //Budget Expenditure Route
    Route::post('/proposals/store_budgetexpenditure', 'ProposalController@store_budget_expenditure')->name('budgetexpenditure.store');
    Route::post('/proposals/store_budgetexpenditure/{proposal}', 'ProposalController@update_budgetexpenditure')->name('budgetexpenditure.update');
    Route::get('/proposals/destroy_budgetexpenditure/{proposal}', 'ProposalController@destroy_budgetexpenditure')->name('budgetexpenditure.destroy');
    //Planning Schedule Route
    Route::post('/proposals/store_planning', 'ProposalController@store_planning')->name('planning.store');
    Route::post('/proposals/store_planning/{proposal}', 'ProposalController@update_planning')->name('planning.update');
    Route::get('/proposals/destroy_planning/{proposal}', 'ProposalController@destroy_planning')->name('planning.destroy');
    //Schedule Route
    Route::post('/proposals/store_schedule', 'ProposalController@store_schedule')->name('schedule.store');
    Route::post('/proposals/store_schedule/{proposal}', 'ProposalController@update_schedule')->name('schedule.update');
    Route::get('/proposals/destroy_schedule/{proposal}', 'ProposalController@destroy_schedule')->name('schedule.destroy');
    //Participant Route
    Route::post('/proposals/store_participant', 'ProposalController@store_participant')->name('participant.store');
    Route::post('/proposals/store_participant/{proposal}', 'ProposalController@update_participant')->name('participant.update');
    Route::get('/proposals/destroy_participant/{proposal}', 'ProposalController@destroy_participant')->name('participant.destroy');
    //Revision Route
    Route::post('/proposals/store_revision', 'ProposalController@store_revision')->name('revision.store');
    Route::post('/proposals/revision_done/{proposal}', 'ProposalController@revision_done')->name('revision.done');
    Route::post('/proposals/revision_undone/{proposal}', 'ProposalController@revision_undone')->name('revision.undone');

    Route::get('/update_profile/', 'ProposalController@update_profile')->name('update.profile');
});
